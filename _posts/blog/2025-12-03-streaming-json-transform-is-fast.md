---
layout: post
title: Streaming JSON parsing and processing is very fast
type: post
categories:
- rust
---

Rust library for [streaming JSON processing](https://github.com/olpa/streaming_json) is suddenly very fast:

![](/assets/2025/ddb_convert_performance.png)

The initial goal of the `rjiter` and `scan_json` was to parse json through a sliding window and transform json even before the complete document is loaded. While working on WebAssembly version I tried to minimize the Rust runtime as much as possible.

As result, the libraries are now `no_std`, alloc-free and zero-copy (not 100% true, but close). Having these properties, it's reasonable to expect that the performance should be good.

As a test, I've developed a [converter between the normal JSON and DynamoDB JSON with type annotations](./dynamodb-convert-tool.html), and vibe coded a few alternatives for comparison. For benchmarks, I used 10GB JSON fixture from [Yelp Academic dataset](https://business.yelp.com/data/resources/open-dataset/).


## Reduce the cloud bill

The exact performance gain depends on the task, but I think the order is plus minus the same. Then:

It makes difference if a task runs 1 hour using a custom tool with `scan_json` inside or 12 hours using a Python converter.

Even if processing time is reduced only twice, it's already twice less money for the cloud compute. For some tasks it can be a significant difference.

"For some tasks" <-- which ones? It's something I want to hear from you. Please share your use cases. I need a collection to eventually decide if further work is possible.


## Further work

There are at least two obvious directions.

First one is getting more speed. The integration of the json parser "[jiter](https://crates.io/crates/jiter)" brings overhead of extra copies and moves. A fine-tuned clone of it would drop unneeded inefficiencies.

Second is the usability. The current interface for matchers is too low level. Instead, it could be possible to develop a domain-specific language, so that many practical applications could be easily written: specialized converters, schema validators etc.

Unfortunately, this all doesn't fit to a weekend project and I can't afford spending time on it. Pity, because the resulting library can be fantastic.

Anyone from VC or cloud providers would like to sponsor?

