---
layout: post
title: Fast converter between DynamoDB typed JSON and normal JSON
type: post
categories:
- rust
---

Amazon DynamoDB API uses [JSON with type annotations](https://docs.aws.amazon.com/amazondynamodb/latest/developerguide/Programming.LowLevelAPI.html). The conversion between this format and normal JSON is mostly simple, but as soon as we work with gigabytes of data, a specialized tool becomes more and more useful.

I've developed a fast converter:

- [`ddb_convert` source code](https://github.com/olpa/streaming_json/tree/master/examples/dynamodb)
- [`ddb_convert` on Docker Hub](https://hub.docker.com/r/olpa/ddb_convert)


## Usage (Docker Hub version)

**Convert to DynamoDB format (stdin/stdout)**

Command:

```
echo '{"name":"Alice","age":30}' | docker run --rm -i olpa/ddb_convert to-ddb
```

Output:

```
{"Item":{"name":{"S":"Alice"},"age":{"N":"30"}}}
```

**Convert from DynamoDB format (using file mount)**

Input file `data.json`:

```
{"Item":{"name":{"S":"Alice"},"age":{"N":"30"}}}
```

When working with files, mount your working directory to `/data`. Command:

```
docker run --rm -v $(pwd):/data olpa/ddb_convert from-ddb -i data.json
```

Output:

```
{"name":"Alice","age":30}
```


## Performance

For benchmarks, I used 10GB JSON fixture from [Yelp Academic dataset](https://business.yelp.com/data/resources/open-dataset/). I've vibe coded a few alternatives for comparison:

- Rust tool using `json_serde`, mapping JSON records to memory dictionaries, and transforming dictionaries between formats
- Python "noboto" tool: similar to the Rust code but implemented in Python
- Python "boto": uses the `boto3.dynamodb` library for conversion

The default approach to do conversion is the version using the boto library.

![](/assets/2025/ddb_convert_performance.png)

`ddb_convert` is twelve times faster than the boto version. Where Python works for an hour, `ddb_convert` finishes in 5 minutes.

[Read more about fast JSON conversion here](./streaming-json-transform-is-fast.html)
