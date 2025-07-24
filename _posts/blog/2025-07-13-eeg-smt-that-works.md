---
layout: post
title: EEG-SMT that works, not just a proof of concept
type: post
categories:
- bci
---

[Olimex](https://www.olimex.com/) sells electrodes that are only good for a PoC, but since they aren't fitted into any headset they make any real-world work nearly impossible. The story by Michal Oblastni:

To solve this problem professionally, I've empirically evaluated different options. I ended up 3d printing Mark 3 Nova from <https://github.com/OpenBCI/Ultracortex/tree/master/Mark_III_Nova> using Creality Ender-3 V3 KE and gluing it together with Loctite:

![3d printed headset](/assets/2025/printed_headset.jpg)

To make it work properly, there are spiky sensors that touch your head when you put it on. Those sensors, incl. springs and other required parts are available at the Ali Express. I've just ordered those.

Notice I screwed in one of the 3d printed bolts that touches the middle of your forehead. Four bolts will be screwed in (CH1+, CH1-, CH2+, CH2-). Their position can be changed any time.

While waiting for parts to arrive, I already got some stereo 3.5 jacks. I chose gold plated even though it's not needed:

![jacks](/assets/2025/jack_2.jpg)

These stereo jacks support 3 wires. Only one wire is mandatory (signal). When you purchase an audio cable with shadowing, it will have two wires. If you wanted to attach an amplifier to have active electrodes you'd use 3 wires.

It is possible to use custom jacks instead of dying a wire directly to each EEG-SMT electrode:

![](/assets/2025/eeg_1.jpg)

![](/assets/2025/eeg_2.jpg)

These are gold cup electrodes from AliExpress for experiments connected using my new 3.5 jacks. They are small enough to fit inside an elastic headband without discomfort. They can be easily taped on your head as well. They also fit inside an EEG cup which I dislike though because it compresses your head which is uncomfortable.

Taping of electrodes is impractical for daily brain training. Hence, Mark 3 sensors and headset win. The benefit is that you simply put on the headset and those electrodes already touch your head. They always touch the exactly correct location. No need to tape anything, and no need to compress your head with an uncomfortable elastic headband. I chose DRY electrodes that don't require any gel or water. Because the position is fixed, yet the whole headset is easily and quickly attachable/removable, you can use AI/ML with this and it will work consistently after you remove the headset and attach it again.

The 3D Printed Mark 3 is a professional solution that costs absolutely nothing because it is Open Source. I didn't find any disadvantage. It's extremely comfortable. You simply put it on, then you can exercise or research, and later just take it off. No need to glue anything, compress your head, etc. It doesn't require changing your haircut either because those DRY electrodes are spiky and the spikes touch your scalp even through hair, without any discomfort (they are dull spikes). It's suitable for a daily hassle-free use.

Of course the standard EEG-SMT DLR electrode is absolutely awful. To solve it, I got this earclip electrode that holds properly on your ear. There are two, but only one is needed. It came with a minijack, so I'll cut the wire and solder it to one of my 3.5" stereo jacks for plugging it into EEG-SMT:

![earclip electrode](/assets/2025/earclip_electrode.jpg)

It's unbelievable how much effort went into figuring it out and testing different options. This is, I believe, how everyone can turn EEG-SMT into an EEG solution that can be used for daily work, not just as a one-time PoC.

### Update

I'm so glad I got rid of the original electrodes and figured out how to use professional EEG electrodes instead. The original electrodes are the worst product I've ever used. Three sprawling wires that don't even hold together, and huge PCBs.
