---
layout: post
title: Choices to fix electrodes for EEG-SMT
type: post
categories:
- bci
---
When <a href="/blog/category/bci/">experimenting with neurofeedback</a> I failed at the cap step. I got medical gel for the electrodes, realized I need to fix them, but then priorities changed and I dropped the project. Today I'd try to use a swimming cap or a sport/physio tape to fix the electrodes.

I'm not the only one to face this problem. I've got a question from <a href="https://github.com/michaloblastni/local-neural-monitoring">Michal Oblastni</a>:

> were you ever able to find or make a cap for it? I’m using
> active electrodes, but they’re flat and pretty large. Most EEG caps don’t
> have openings big enough, and even when they sort of fit, the electrodes
> don’t stay in place well.

After I answered with the first paragraph of this post, Michael shared his research. The rest of this post is his text.

I tried using tape to hold the electrodes in place, but it doesn’t work
very well. It keeps shifting slightly each time, and as a result, advanced
algorithms like AI-based feature detection can’t get a stable signal,
especially when the tape starts peeling off.

I’ve been doing some design science research and found quite a bit of
existing knowledge on how to keep EEG sensors steady.

Here are some of the approaches I came across:

- EEG headset: using a regular headset with headphones and a mic, modified
to hold electrodes
- EEG glasses: attaching sensors to the sides of standard eyeglasses
- EEG halo: a ring-shaped wire or plastic frame worn like a crown
- EEG headband: a stretchable sports headband (like from Nike or Adidas)
with sensors attached
- EEG cap: a swimming cap with holes for sensors, which you mentioned
- Diving goggles: sensors mounted onto the frame

Most of these are plastic, but some are textile (like the headband), or
even basic metal wire shaped into a ring that sits around the head with
sensors attached.

And one more option, that's creative, customizable, and easier: You can ask
ChatGPT to design an artifact for 3d printing.

Tell it to design an EEG
headset. It will ask for your head circumference. So, use a tape measure
and find when you put it on your eyebrows, and all the way behind your back
of the head that you need i.e. 60cm. Then, tell it that you will be
attaching EEG-SMT electrodes to the headset in positions F7 and F8 based on
the 10/20 international system.

And it will design small circular edges
where the EEG-SMT sensors can be glued. Or, you can design it to slide them
in, so that only the conductive bottom part of the electrode is visible.
The rest is inserted into the plastic EEG headset.

And finally, ChatGPT can
give you the exact `eeg_headset.stl` that you can open with FreeCAD and print
on a 3d printer, or email it to some shop in your city that offers a cheap
3d printing. They will print it for you, very cheap, and then you can use
it for hassle-free experiments.

Unlike other solutions, this is based on
the exact size of your head, so everything fits 100% perfectly. ChatGPT
does all the work, so there should not be anything needed except emailing
it to someone who will print it. But as always with AI, one has to validate
it's correct before depending on its answer.
<a href="/assets/2025/eeg_headset_f7_f8.stl">I am attaching</a> what ChatGPT
designed in 5 minutes. FreeCAD is Open Source and it's at
<https://www.freecad.org/downloads.php>.

