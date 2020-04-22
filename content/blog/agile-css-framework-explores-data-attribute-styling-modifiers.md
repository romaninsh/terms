---
title: Agile CSS Framework explores data-* attribute styling modifiers
date: 2016-01-12
tags:
  - test
draft: false
---


Traditionally CSS frameworks have relied on ability to combine multiple CSS classes for widget styling. While one class may specify the name of the widget (dropdown-menu), a supplementary class (dropdown-menu-right) will define some property such as positioning of a menu:

``` html
<ul class="dropdown-menu dropdown-menu-right">
  ...
</ul>
```


Over the past few years I have worked with Agile CSS which relies very heavily on the concept of modifiers allowing your HTML code to specify size, alignment, paddings, selection of color palette and many other properties. Next example uses Agile CSS to style a `span` in a format of a green circle with a border:

``` html
<span "atk-shape-circle atk-swatch-green atk-padding-xsmall
    atk-text-baseline-reset atk-border-outline"></span>
```

<!-- excerpt -->

The heavy focus on "modifiers" makes one of the unique points of [Agile CSS](http://css.agiletoolkit.org/) - ability to design entirely new widgets with very little additional CSS code and by focusing of re-usability. This approach have proven to be quite effectie at designing custom layouts, custom widgets and custom color schemes.

I know the author of Agile CSS pretty well and in the latest branch he has started using a new way of specifying CSS modifiers through *data-XX* attributes. This produces a cleaner HTML code and has also reduces size of your `style.css` file. Here is the HTML example which is using new style modifiers:

``` html
<span class="atk-swatch-green" data-shape="circle"
    data-padding="all-xs" data-text="baseline-reset"
    data-border="outline"></span>
```

### The Component CSS Framework and Modifiers

If you have used CSS Frameworks you might be aware that there are different "design principles" that CSS frameworks use in their design. I would like to look into the following two CSS framework design principles:

 1. Widget-centric CSS frameworks
 2. Component-driven CSS frameworks

### Widget-centric CSS framework

Such a CSS framework would dedicate some portion of it's code to be used for a very specific widget, such as - Button Group. The markup for creating Button Group in Bootstrap:

``` html
<div class="btn-group" role="group">
  <button type="button" class="btn btn-default">Left</button>
  <button type="button" class="btn btn-default">Middle</button>
  <button type="button" class="btn btn-default">Right</button>
</div>
```

Similarly a Foundation has a dedicated class for the button group, although the HTML code snippet is different:

``` html
<ul class="button-group">
  <li><a href="#" class="button">Button 1</a></li>
  <li><a href="#" class="button">Button 2</a></li>
  <li><a href="#" class="button">Button 3</a></li>
</ul>
```

Curiously - a very similar widget to Button Group is pagination, but it is expressed using the entirely different markup and CSS class. Bootstrap and Foundation use the same HTML here which reads:

``` html
<nav>
  <ul class="pagination">
    <li><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">2</a></li>
  </ul>
</nav>
```

If we look at the framework itself, then the [code styling paginator](https://github.com/twbs/bootstrap/blob/master/less/pagination.less) is separate from the [code that styles button group](https://github.com/twbs/bootstrap/blob/master/less/button-groups.less).

To conclude - Widget-centric CSS framework would focus on developing each component separately. The structure for each widget would be different and features implemented in one widget would not work in another widget.


#### Component-driven CSS Framework

In the pursuit of to build a more re-usable and flexible framework, CSS developers understood that some code can be shared between components. Each widget was broken down into low-level components that define shape, padding, outlines, palette and behavior of contained elements. By applying several CSS classes to a single HTML elements it's possible to build new widgets - even if CSS Framework developers haven't thought of them.

This principle of multiple levels of building blocks defines what we call a Component-driven CSS frameworks.

Over the last few years I've been actively using Agile CSS framework which follows the principle of CSS class reusability and concept of "modifier" classes. But first, allow me to add a example for button group in Agile CSS:

``` html
<div class="atk-buttonset">
  <button class="atk-button">Button</button>
  <button class="atk-button">Button</button>
  <button class="atk-button">Button</button>
</div>
```

And similarly the paginator:

``` html
<div class="atk-buttonset">
  <a href="javascript:void(0)" class="atk-button-small">1</a>
  <a href="javascript:void(0)" class="atk-button-small">2</a>
  <a href="javascript:void(0)" class="atk-button-small">3</a>
</div>
```

Both are actually using the same mark-up. A closer inspection of the [atk-button-set code](https://github.com/atk4/agiletoolkit-css/blob/master/framework/less/components.less#L216) tells us that it's not actually a widget, but rather a modifier that makes buttons stick together.

When defining a more complex components (such as Navigation Bar), Agile CSS does not rely on pre-made LESS file, but manipulates basic components. By re-using CSS classes you get insane saving in the size of CSS file, great reusability and flexibility to design new elements and arrange them in new ways.

Bootstrap has to individually style everything that you can potentially include in the navigation bar - [form, buttons or links](https://github.com/twbs/bootstrap/blob/e38f066d8c203c3e032da0ff23cd2d6098ee2dd6/less/navbar.less#L286).

(Note: Agile CSS is also a responsive framework, but the responsiveness is implemented differently. Perhaps a topic for yet another blog post)

#### Modifier-infused code

Agile CSS puts more weight on the HTML and use of various CSS modifier classes to make your markup behave the way you need:

``` html
<section class="atk-padding atk-padding-vertical-small">
  <h5 class="atk-swatch-gray-text">Heading</h5>
  <div class="atk-cells">
     <div class="atk-cell atk-text-medium">Model</div>
     <div class="atk-cell atk-align-right atk-swatch-green-text">
       <span class="icon-dot-circled"></span>
       <span class="atk-text-medium">&nbsp;Responding</span>
     </div>
  </div>
  ...
</section>
```

<div class="atk-move-right atk-padding-left" markdown="1">
![image](blog-images/agile-css-widget-preview.png)
</div>

With the wide selection of various classes that can appear in your HTML here and there to create a custom widget, it can be quite confusing to see what each class is doing.

To avoid this problem, Agile CSS is trying the concept of assigning styles to your HTML through *data-XX* attributes. The use of those attributes allow to supply modifiers at a much more granular level:

``` html
<section data-padding="all top-s bottom-s">
  <h5 class="atk-swatch-gray-text">Heading</h5>
  <div class="atk-cells">
     <div class="atk-cell" data-text="medium">Model</div>
     <div class="atk-cell atk-swatch-green-text" data-align="right">
       <span class="icon-dot-circled"></span>
       <span data-text="medium">&nbsp;Responding</span>
     </div>
  </div>
  ...
</section>
```

Here are few other examples:

``` html
<div class="atk-cells">
  <div class="atk-cell atk-expand atk-swatch-gray-text atk-size-kilo"
      data-text="caps" data-items="spacing-xl">Status:</div>
  <div class="atk-cell atk-swatch-green-text"
      data-items="spacing-xl">..</div>
</div>
```

The example above uses `data-items` and `data-text` to make changes text size and spacing. The next example builds a rounded button with some extra padding and outline and initial "RS" in the middle of the button.

``` html
<a class="atk-button atk-swatch-gray" data-padding="all-xs"
    data-border="outline thick" data-shape="circle" href="#">RS</a>
```

## My Thoughts on Modifiers

My thoughts on the use of `data-XX` for styling are mixed. I can see some of the advantages, where it gives a better flexibility to define padding sizes especially by combining top/left/bottom/right with xs/s/reset/l/xl, however I'm worried that use of those data-attributes may conflict with 3rd party JavaScript code, which may want to use those for their own purposes.

CSS classes are mainly used for styling, while data-X are mainly used by JavaScript. While CSS allows us to target both, I am wondering if this is a correct approach.

Still I'm willing to explore the possibilities here. I am very curious of what you might think about this new technique in a CSS framework.

