---
layout: post
title: Running Notes
type: post
categories:
- projects
---

**Your inbox for thoughts. Capture now. Process later.**

Good ideas often arrive while walking, cooking, driving, or between meetings. Voice memo applications make them easy to record but just as easy to forget. Running Notes puts each recording in a dedicated inbox, where it can be processed using familiar mail tools and habits—or by email automation agents.

**Try it:** <https://notes.handsfree.vc/>

## How it works

1. Log in, or enter the public guest account without registering.
2. Record a voice note in the browser.
3. Find the recording as an audio attachment in Running Notes, Outlook, Apple Mail, Thunderbird, or another IMAP client.

Running Notes provides a separate mailbox rather than forwarding recordings to your personal email address. Notes stay apart from ordinary mail while retaining familiar inbox features such as folders, flags, search, and archiving.

The current MVP focuses on validating this workflow. It does not transcribe or summarize recordings.

## A few technical notes

The browser records audio with the MediaRecorder API and uploads it to a FastAPI backend. The backend converts accepted uploads to compact MP3 and submits each note as an email message over LMTP to Dovecot. Dovecot then handles the dedicated IMAP mailboxes.

I deliberately used existing mail infrastructure instead of reimplementing mailbox storage and IMAP behavior in the application. The web app has its own Messages page too, but it reads mail through Dovecot's restricted HTTP API rather than by opening Maildir files directly.

Running Notes also includes Outlook and Thunderbird autoconfiguration endpoints, so a mailbox can be added to a standard mail client without copying every server setting by hand. Outgoing mail is intentionally disabled: authenticated SMTP submission exists only as a compatibility sink and rejects delivery instead of relaying messages.

The service is packaged as a Docker Compose stack with nginx, FastAPI, SQLite, Dovecot, TLS, quotas, bounded logs, and resource limits. It was built to be small, but to have the operational shape of a real hosted service.

## Build Week and AI-assisted development

Running Notes started as a single-user proof of concept. During [OpenAI Build Week](https://openai.devpost.com/) I used Codex and GPT-5.6 to turn it into a public, multi-user product: containerized deployment, a no-registration guest path, browser mailbox playback, mail-client setup, quotas, and production configuration.

One memorable debugging session: the web mailbox only showed "Messages unavailable". GPT-5.6 traced the failure across the FastAPI backend, container networking, and Dovecot's HTTP API. The root causes were version-specific Dovecot 2.4 configuration syntax and an authentication mismatch. It fixed the configuration, restarted services, verified live HTTP 200 responses, ran tests, and committed the fix in about fifteen minutes.

Source code: <https://github.com/olpa/running_notes/>
