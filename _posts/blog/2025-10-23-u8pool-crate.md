---
layout: post
title: U8pool, a stack for u8 slices in a client-provided buffer
type: post
categories:
- rust
---

I've just published a new crate `u8pool`:

- Uses preallocated memory to store byte slices
- Optionally with a companion `Sized` object
- The interface is stack-based, with forward and reverse iterators
- The code is `no_std`, without dependencies

Links

- [u8pool on crates.io](https://crates.io/crates/u8pool)
- [subproject on github](https://github.com/olpa/streaming_json/tree/master/u8pool)

I use `u8pool` in a json processing library, to store the path from the top to the current nested json element, together with the parser state on each level. I suppose all recursive parsers need something like it.

Please try, review, tell about your use cases! If you liked `u8pool`, please star the github repo: <https://github.com/olpa/streaming_json/>.
