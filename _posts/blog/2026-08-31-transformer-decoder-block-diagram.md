---
layout: post
title: Transformer decoder block diagram
type: post
categories:
- ml
---

Re-implementing the transformer architecture and reasoning about its time and space complexity is hard. This activity requires that the brain loads extra details such as traditional naming of parameters and dimensions. It's a side activity for me; each time I have a time slot to do something, I realize I spend the whole slot remembering the details.

As a solution attempt, I diagrammed the transformer architecture (the decoder part). Next time I'll take a look at the diagrams and remember everything in a minute, not in half an hour.

You might find the result useful too. Feel free to use, but beware of possible errors!

[Transformer decoder block diagram (PDF)](/assets/2026/transformer-block-diagram.pdf)

The diagram covers four levels: the top-level transformer flow, the internals of a decoder block, multi-head and causal attention, and the SwiGLU feed-forward layer. Each box is labeled with its tensor's dimensions: `seq` (sequence length), `hidden` (embedding size), `head` (per-head dimension), `interm` (intermediate size), and `vocab` (vocabulary size). `mm` marks a matrix multiply.
