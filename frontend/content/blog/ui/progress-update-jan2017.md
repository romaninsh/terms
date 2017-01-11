# Agile Toolkit progress update (Jan 2017)

![agile-toolkit-progress-2017](../../images/ui/agile-toolkit-progress-2017.png)

Over the holidays I've been working away on [Agile UI](http://github.com/atk4/ui) to achieve a considerable progress. The dependencies are pretty tangled up, but I've tried to explain them in the diagram above.

**If you are not familiar with "Agile UI" - it is an open-source project I'm currently developing with a goal to create "Out-of-the-box UI" that any PHP developer would be able to "use" instead of "reinventing".**

<style>

  img { width: 100% }

</style>

## Render Tree and basic UI components

Agile UI now has a very stable render mechanics. There are some awesome and simple way to integrate more elements from Semantic UI and if we need to add a new box, panel or icon class, it's as simple as this:

``` php
namespace atk4\ui;
class Label extends View
{
    public $ui = 'label';
}
```

The "View" class here takes care of the rest. Some elements have support for nested icons or labels and the UI implements it like this:

``` php
public function renderView()
{
    if ($this->icon && !is_object($this->icon)) {
        $this->icon = $this->add(new Icon($this->icon), 'AfterInput');
        $this->addClass('icon');
    }

    if ($this->iconLeft && !is_object($this->iconLeft)) {
        $this->iconLeft = $this->add(new Icon($this->iconLeft), 'BeforeInput');
        $this->addClass('left icon');
    }

    if ($this->label) {
        $this->label = $this->prepareRenderLabel($this->label, 'BeforeInput');
    }

    if ($this->labelRight) {
        $this->labelRight = $this->prepareRenderLabel($this->labelRight, 'AfterInput');
        $this->addClass('right');
    }

    if ($this->label || $this->labelRight) {
        $this->addClass('labeled');
    }
  
  	return parent::renderView();
}
```

The code above makes it super-really for user to create a View that includes Icon or a Label:

``` php
$layout->add(new \atk4\ui\FormField\Line([
    'placeholder'=>'Search users',
    'label'=>'http://'
]));

$layout->add(new \atk4\ui\FormField\Line([
    'placeholder'=>'Amount',
    'label'=>'$', 
    'labelRight'=>new \atk4\ui\Label(['.00', 'basic'])
]));

$layout->add(new \atk4\ui\FormField\Line([
    'placeholder'=>'enter tags',
    'iconLeft'  => 'tags',
    'labelRight'=> new \atk4\ui\Label(['Add Tag', 'tag']),
]));
```

Each line renders into a View producing output like this:

![ui-field-elements](../../images/ui/ui-field-elements.png)

## Form Update

In the 4.3 version of Agile Toolkit ability of a form to use default layout has been a pretty big boost in performance. Assuming you have your 'user' model defined, you wouldn't want to create a tempalte for the "user preferences" form. Simply specify the fields and the form renders nicely.

In Agile UI I wanted forms to be just as easy to add, however retain more flexibility and modularity. I've made few decisions:

-   Form logic and Layout logic is separate.
-   For Layout you can use one of the form layouting engines.
-   You can also use any other view (or combination) for a layout.

The result would give you 3 options:

-   With `$form->setModel($user)` populate all fields and that's it.
-   Create combination of views (tabs, columns, or custom layout), then stick multiple Form Layouts in there.
-   Arrange all the fields manually.

The second option gives you a middle-ground between doing everything manually or automatic function. It would allow you to arrange blocks of fields as you wish and still retain high degree of automation.

### Form JavaScript

In 4.3 forms used a custom code to collect data and submit themselves. In Agile UI we can use Semantic UI's `api()` method to collect data, pack it up and send back to the form's callback object. There are no custom JS code (apart from a small bit that implements execution of some AJAX responses).

A form will have 3 ways of operation: "POST", "GET" and "API" with the latest being the default. Field error highlighting will be taken care of automatically in all the cases and user does not have to prepare separate handlers for each of those.

## Agile Data Integration

I'm looking to use Agile Data Persistence concept to implement "UI Persistence". From a viewpoint of a domain model, displaying it inside a form or inside a grid is just yet another way of persisting it. This works amazigly well with our ability to convert / format types as well as both store and read data.

In other words - Form object is a way for a "Model" to store data. Once form is submitted, data can be read from the "UI" persistence just to be saved into a more permanent one - Database.

When it comes to multi-page wizard, it can rely on other persistences such as session, but at the end of the day, you want a call-back that will save "wizard" data in the Database as well.

There are a lot of synergy and although I might need to do minor tweaks inside Agile Data it's already capable of doing everything Agile UI requires.

## Application Interface and Integrations

I want Agile UI to be working out-of-the-box inside various popular PHP frameworks. While Agile UI handles a lot of things on it's own such as storing / loading data and rendering HTML it must still rely on some other things on the "Application".

A bundled Application class ('App') can do a lot of things out of the box - generate URLs, provide POST/GET data as well as use as an object for a dependency injections, the 'Application' interface can be implemented by alternative implementations. For example Laravel framework integration may create an 'AgileLaravel\App' class:

``` php
class AgileLaravelApp implements \atk4\ui\Application
{
    // creates link to specified page with specified arguments
    function url($page = null, $args = []) {
        ..
    } 
  
    // create and integrate a specific UI layout
    function setLayout($layout) {
        ..
    }
  
    // locate and load template
    function loadTemplate($name) {
        ..
    }
  
    // create object respecting class map
    function factory($class_name, ...$arguments) {
        ..
    }
}
```

So as a result the same Agile UI code may be using different layouts or generating URLs differently depending on the environment. 

## Getting Involved

If you like the idea of having eaasy-to-use PHP UI, why not integrate Agile UI with your full-stack framework? Contact me and we can discuss the posibilities.

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
