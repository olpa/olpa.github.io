---
layout: post
title: Analysis of EEG signals
type: post
categories:
- bci
---

Michal Oblastni published a [Jupyter Notebook for EEG signal analisys](https://github.com/michaloblastni/local-neural-monitoring/blob/main/EEG_data_analysis.ipynb). Here are his comments:

For data collection, just attach a wire or a small metal object to your head. It will have conductivity.

When voltage from your scalp is conducted through a wire, amplify it from microvolts to millivolts, and convert analog millivolts to digital information.

Finally, expose digital information as bytes of data via a USB controller for a computer to be able to see the measured voltage. Different positions on your scalp have different voltages depending on electrical <https://en.wikipedia.org/wiki/Cell_signaling>.

[EEG-SMT](https://www.olimex.com/Products/EEG/OpenEEG/EEG-SMT/open-source-hardware) measures voltage 256 times per second. It's only a 2 channel device, hence suitable for a PoC.
