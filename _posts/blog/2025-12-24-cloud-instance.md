---
layout: post
title: Home PC in cloud
type: post
categories:
- vibecoding
---

I do vibe coding on Android phone while walking. The biggest challenge was setting up a development environment. While I haven't finished perfecting it yet, I've made enough progress that the remaining issues are less critical. Let me share what I've learned so far.

My first obvious attempt was to install Termux (<https://termux.dev/>), a terminal emulator with a full Linux environment. It works incredibly well. All the standard development tools are available as packages, and I was able to write Rust and Python programs without issues.

The only important configuration step is setting up Termux's extra keyboard row, which adds symbols we use constantly in programming: different sorts of brackets, semicolons, and so on.

The real showstopper, however, is AI development. Even in a normal environment, finding a compatible set of Python modules is a special skill. NumPy, SciPy, PyTorch, TensorFlow, the list goes on. For an unconventional environment like Android, it's practically mission impossible, though I've seen some developers manage to compile and run everything.

Instead of solving these exciting technical problems, I took the cloud route.

The idea was simple: before each coding session, start a server in the cloud that would automatically shut down after a couple of hours. Additionally, a cloud volume would be attached automatically, providing persistent file storage.

This setup works perfectly.

But as soon as I realized that the smallest Hetzner (<https://www.hetzner.com/>) instance is enough for 99% of my tasks and costs very little, I just let the cloud instance run continuously. The convenience of having the system available at any moment under the same IP address outweighs the under 10€ cost.

I still use temporary servers for heavy ML workloads on AWS.

For those who would like to work in a similar way, feel free to check out my Terraform files: <https://github.com/olpa/dot_files/tree/master/cloud-instance>. There are also snippets for SSH config and Ansible. The code is in "works for me" state, but it's a solid foundation for other use cases.
