---
layout: post
title: AI code review, round 13
type: post
categories:
- vibecoding
tags:
- rust
- code-review
---

I'm in the 13th round of AI code review of my Rust library (codecs, WIP), and each round has forced non-trivial changes. Some findings take an effort even to understand. Some reveal architectural problems. Annoying, but I keep learning things I never had a reason to think about.

Two interesting cases.

## Is the buffer stable?

I use the trait `AsMut` to access a byte buffer. My silent assumption: the buffer doesn't change as long as there are no mutable operations on the wrapping object. Therefore, a saved position stays valid between calls.

This property is reasonable to expect, and only an adversarial object would behave differently. But still, it is not promised.

I asked on the forum: [Is `AsMut<T>` stable across repeated calls?](https://users.rust-lang.org/t/is-asmut-t-stable-across-repeated-calls/143258) The discussion is still ongoing. Meanwhile, the review agents are instructed that I know what I'm doing: reasonable implementations don't misbehave.

## Is EOF final?

After some interrogation, Claude Code formulated an issue as:

> The reader's `Ok(0)` is treated as EOF, and is final.

My first reaction was: sure, what else? Then I thought about clients who would like to implement `tail -f`, where EOF is _not_ final. Down the rabbit hole:

- The `tail` utility, two approaches:
  - [GNU](https://github.com/coreutils/coreutils/blob/master/src/tail.c) reads the raw file descriptor, where EOF just means "nothing yet".
  - [BSD](https://github.com/freebsd/freebsd-src/blob/main/usr.bin/tail/forward.c) reads through stdio and has to call `clearerr` after each EOF.
- Kernel: reading after EOF is perfectly normal.
- libc: EOF is latched. Once EOF is returned, it is returned forever, unless `clearerr` is called.
  - But glibc before 2.28 didn't latch EOF ([bug 1190](https://sourceware.org/bugzilla/show_bug.cgi?id=1190)).
- Pipes and network sockets are separate cases.
- And so on.

In the end, the solution: document that any EOF is a final EOF. If a client needs a different interpretation, it should use low-level workarounds. Maybe not the best solution, but it closes the case, and the behavior is reasonable.

## Not only me: the PostgreSQL 19 case

Looks like I'm not alone. PostgreSQL 19 was delayed, with significant features reverted. In [The reverts will continue until morale improves](https://peter.eisentraut.org/blog/2026/10/09/the-reverts-will-continue-until-morale-improves), Peter Eisentraut names two kinds of problems:

- "significant architectural defects that would have been hard to fix quickly and during beta"
- "a long tail of relatively harmless issues involving various edge cases"

In the past, such issues surfaced over years and were fixed bit by bit. Now LLM-assisted review finds them much faster, "and then you're staring at a list of like forty defect reports." A small WIP library and PostgreSQL hit the same wall.

Notably, most of the reverted features "were written a long time ago when LLM-assisted code review was not as useful as it is now."

## Lesson

Most of the findings were not bugs in the usual sense. They were design decisions I had never made explicitly.

At design time, such a decision takes a minute. At round 13, it's a rabbit hole.

Lesson: AI review from the first commit, not after the code is "done".
