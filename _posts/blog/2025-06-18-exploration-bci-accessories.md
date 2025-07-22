---
layout: post
title: Exploration of BCI headbands, headsets and electrodes
type: post
categories:
- bci
---

Towards BCI (Brain-Computer-Interface): At this point the small electrodes with a headband that supports repositioning seem to be the best option for simple use cases. Below is a longer story by Michal Oblastni.


## First attempt: ask those who did it

There is an article by Giovanni Acampora, Pasquale Trinchese and Autilia Vitiello, "A Dataset of EEG Signals from a Single-Channel SSVEP-Based Brain-Computer Interface", <https://www.researchgate.net/publication/349023244_A_Dataset_of_EEG_signals_from_a_single-channel_SSVEP-based_Brain_Computer_Interface>.

Michal contacted the authors with questions, to be answered yet:

- I was especially interested in the EEG-SMT headset you used. Would you mind
sharing the 3D model you used for printing it?

![EEG paper headset](/assets/2025/eeg_paper_headset.png)

- I also really liked how you enhanced the electrode using gold-plated pins,
very clever.

![EEG paper electrodes](/assets/2025/eeg_paper_electrodes.png)

What are these pins typically called when ordering them online or from
electronics suppliers? The closest match I’ve found so far is this:
<https://www.amazon.co.uk/MicroMaker-Adafruit-Accessories-Through-Inline/dp/B0CVMCXD8V>


## Headband

After doing some digging, I found out you can use the EEG-SMT like this:

![EEG headband example](/assets/2025/headband_example.png)

A cheap elastic headband (under 10 EUR) works well. The EEG-SMT electrodes have 4 small holes, so you can sew them onto the band using a needle and thread.


## Electrodes

While playing with my EEG-SMT device, I found it's possible to solder an ordinary wire to the electrode, and touch your head with that wire. It seems to work the same.

That means it's possible to buy a 4 gold plated electrodes. One costs  €2.95.  They are single wire electrodes. The single wire can be soldered to the EEG-SMT electrodes and everything works. <https://www.aliexpress.com/item/1005008999662099.html>

![Electrodes set](/assets/2025/electrodes_set.png)

And I also found a cheap, adjustable EEG headband that allows repositioning these electrodes quickly and easily. <https://www.aliexpress.com/item/1005008922828624.html>

![Sample headband](/assets/2025/ali_headband1.png)

![Sample headband](/assets/2025/ali_headband2.png)

Then, I found an earclip electrode which can, again, be used and the wire can be soldered to the EEG-SMT DLR electrode: <https://www.aliexpress.com/item/1005005883419082.html>

![Earclip electrode](/assets/2025/earclip.png)

With the earclip and small, normal electrodes the signal will be really good. I can also see how comb shaped dry electrodes could be used: <https://www.aliexpress.com/item/1005008709097720.html>

![Comb shaped electrode](/assets/2025/comb_electrodes.png)

So, at this point the small electrodes with a headband that supports repositioning seem to be the best option for simple use cases.


## Learning to 3D print

If you’ve got a soldering iron and some solder, you can attach gold-plated pins (or even basic ones) directly to the electrodes. It’s a quick fix, but not ideal long term.

A custom 3D-printed headset is obviously a better and more comfortable option, but it does mean modeling it properly in CAD first.

I ended up buying a Creality Ender-3 V3 KE 3D printer. The print area is 220x220x240 mm, so I had to split the headset into two pieces using Creality Print.

After printing both parts, I realized the design is pretty basic and still needs some CAD work—mainly to make it easier to mount the electrodes.

This YouTube video gives a good overview of different CAD tools: <https://www.youtube.com/watch?v=IUoTKbGAlhk&ab_channel=MakeWithTech%28MakeWithTech%29>

One great option is TinkerCAD. It’s 100% free, browser-based, used by students worldwide, and you can log in with a Google account—no separate signup needed: <https://www.tinkercad.com>


