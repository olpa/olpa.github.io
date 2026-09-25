---
layout: post
title: "Reliable AI Agents: A Pre-Pitch"
type: post
categories:
- ai
tags:
- ml
- llm
- agents
- reliability
- erlang
- beam
excerpt: >-
  A reliable agent is an agent that does not fail, or, at least, can recover when it does.

  The clearest example is a long task. Imagine a workflow with one hundred steps. If the agent fails at step 98, it would be a shame to lose the whole process.
---

## Why to care

A reliable agent is an agent that does not fail, or, at least, can recover when it does.

The clearest example is a long task. Imagine a workflow with one hundred steps. If the agent fails at step 98, it would be a shame to lose the whole process.

The loss is not just tokens and money: the agent may no longer be able to reach its goal, because some of the things it needed may no longer be there.

## Existing approaches

How can we prevent that? Several approaches already exist, and Temporal is probably the best known. But our goal is different: we want to build a different kind of foundation, a framework for building agent frameworks, based on reliable execution.

At this basic level, it does not matter whether the agents are AI agents or normal software agents. What matters is being able to run a long workflow with many steps, some of which may not always behave the same way, while still surviving failures and recovering from them.

Several other agent frameworks already exist, but I do not know how they handle execution underneath. I suspect none of them use the approach described below. If they did, I would expect them to say so clearly, not leave it for someone to discover by digging.

## 40-year stable answer for rack-scale systems

Software engineering already has a model for systems made of independent parts that can fail, and are expected to fail. In this model, failure is not something unusual; it is a normal part of running the system. That model comes from Erlang and its runtime, the BEAM virtual machine.

BEAM offers a set of ideas and practices that have proven good enough to build highly reliable systems, whether on a single machine or across a small group of machines close together, like in the same rack. So the question is: why not adapt those ideas for a much more spread-out environment?

## Modern reimplementation as a foundation

Erlang was built for programs running on one machine, or on machines near each other, where communication between them is expected to be very fast. In our new version, fast communication between machines matters less. What matters more is durable execution and recovery. What we want to keep from BEAM is its way of handling reliability.

Our starting point is this: if we can rebuild the key behavior of the BEAM virtual machine in a spread-out setting, we will have built the foundation needed for reliable, multi-step systems, not just most of it, but all of it, since BEAM's decades in production give us confidence that we have not missed anything important.

That would be the first layer. The second layer would be a more usual framework built on top, with higher-level building blocks useful for AI agents working on their own, and for humans working alongside them.

## The unresolved question

All of this only matters if reliable AI-agent workflows are truly a problem without a solution yet, and I am not yet sure that they are.

When I look at Claude Code, Codex, and similar agent tools, an interruption does not seem like a disaster. Often you can simply tell the agent to continue, and it picks up where it left off. The history may be nothing more than a list of JSON messages, but that history matters a great deal: it may already hold enough information to recover.

So the main question still needs an answer. **Do AI agents really need a new way to stay reliable, or are today's tools and workflow systems already reliable enough?**

Until the answer to that is "yes," I would not turn this idea into a startup pitch.
