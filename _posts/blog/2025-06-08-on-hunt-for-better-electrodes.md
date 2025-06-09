---
layout: post
title: On hunt for better electrodes
type: post
categories:
- bci
---
After fixing EEG noise <a href="">using software</a> and <a href="">fixing electrodes</a>, the next step is to upgrade electrodes.

Once again, the text below is from <a href="https://github.com/michaloblastni/local-neural-monitoring">Michal Oblastni</a>:


I’ve also looked at the EEG-SMT electrodes themselves. Based on other EEG
designs, I think they need a small hardware mod. One option is to add
short, blunt pins that can grip the scalp better—even through hair. Here’s
an example with gold pins:

![eeg-rm](https://raw.githubusercontent.com/splithor1zon/EEG-ReMake/refs/heads/master/img/1.jpg)

These could replace the flat default electrodes.

Alternatively, I found some other compatible electrodes that are pretty
cheap. I use the active ones from Olimex, which don’t need gel and include
a built-in amplifier:

<https://www.olimex.com/Products/EEG/Electrodes/EEG-AE/open-source-hardware>

All it really takes is a soldering iron and a few basic parts. Even
standard electrodes can work fine with EEG-SMT, since they just connect the
scalp to the amplifier. As long as the signal path is preserved, we’re good.

