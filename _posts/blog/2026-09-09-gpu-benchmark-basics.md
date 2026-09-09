---
layout: post
title: Double-checking GPU acceleration basics
type: post
categories:
- ml
---

The habit of double-checking the basics has bitten me again. This time it was GPU acceleration.

To see that GPU makes the calculations faster, I've run a code snippet to benchmark matrix multiplication. The result was: 10 times slower than it should be.

Issue 1: the GTX 1650 doesn't have Tensor Cores for matrix multiplications. cuBLAS, and then PyTorch, doesn't have a well-tuned non-Tensor-Core FP16 GEMM path for this chip, causing a slowdown.

Switching to FP32 did the trick: the observed performance is close to the datasheet.

Issue 2: I tested performance on matrices of different sizes: 512, 1024, 2048, etc., to see the efficiency saturation. And again: initially it goes as expected, then there is a sudden drop at size 4096.

AI suggests it is due to cuBLAS's internal algorithm/kernel-selection heuristic, and I can't do anything. Good to know. The only worry is that 4096 is the embedding size of Qwen, therefore I'd expect some performance degradation.

But OK, for local inference I'm going to use different hardware anyway.

That's how five-minute tasks take hours.
