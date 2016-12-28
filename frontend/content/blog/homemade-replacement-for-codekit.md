
# Homemade replacement for CodeKit

Since I have purchased CodeKit I have been having problems, where it
occassionally hangs, consumes too much memory or crashes. I it only to
compile JADE/PUG files, so I decided to create my own solution based on
some open-source utilities.

I appreciate all the advanced features of CodeKit, but if you are looking
for just a lightweight solution to compile your files instantly, then my script
will work for you:

https://gist.github.com/romaninsh/e6c783ec916ae176f55e3ee6b5e43b73

## Installation

Make sure you have homebrew installed. In the terminal:

``` bash
mkdir ~/bin/
wget https://gist.githubusercontent.com/romaninsh/e6c783ec916ae176f55e3ee6b5e43b73/raw/5d39c8b7f3806bf2ae8b4f4e19bf5834367be93c/pugwatch > ~/bin/pugwatch
chmod +x ~/bin/pugwatch
```

Next, in the terminal go to your project folder (or just home folder) and run pugwatch

``` bash
cd ~/Sites/
pugwatch
```

## Features

I wanted script to be super ligthweigth so that you can open it up and tweak as
you want. Here are some of the features:

 - Watches unlimited number of files easily
 - Tested on a Mac only, might need tweaking for Linux
 - Compilation errors will be shown in the terminal
 - Each compile will display Notification message
 - Make sound on error

Script is in public domain, and you are welcome to improve or re-use this script.

## Comments

<div id="disqus_thread"></div>
<script>
(function() {
var d = document, s = d.createElement('script');

s.src = '//nearlyguru.disqus.com/embed.js';

s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
