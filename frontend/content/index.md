<h2 class="atk-push-large atk-align-center atk-text-caps font-amatic">Latest from the <a href='{page}blog{/}'>Blog</a></h2>

<article class="atk-box-large">
  <div class="atk-push">
    <h3 class="atk-text-baseline-default atk-push-reset"> <a href="{page}blog/history-of-agile-toolkit{/}">History of Agile Toolkit</a></h3>
      <div class="atk-text-dimmed">Published in Blog on 14/03/2016</div>
  </div>
<div markdown="1">

Agile Toolkit is my software project that I have started all the way back in 2000 and has been in my care for almost 2 decades now. This projects reflects my desire to simplify life of a web developer and introduce some unique concepts in web development.

#### What Motivated me to create Agile Toolkit?

Agile Toolkit was created to solve the re-usability problem as I was having while creating series of admin interfaces for a rather simple websites. All of those sites would implement interface where certain type records had to be listed, created, deleted and modified. In a modern days we call this a CRUD (Create, Read, Update, Delete), but back in 2000 this rather new concept. Eventually more modules were added allowing more than the 4 basic actions which resulted in the early name of the framework: "a-modules".

</div>
  <p><a href="{page}blog/history-of-agile-toolkit{/}">Read more..</a></p>
</article>







<article class="atk-box-large">
  <div class="atk-push">
    <h3 class="atk-text-baseline-default atk-push-reset"> <a href="{page}blog/real-life-db-agile-toolkit-example{/}">Real-life Database example for Agile Toolkit</a></h3>
      <div class="atk-text-dimmed">Published in Blog on 02/02/2016</div>
  </div>
<div markdown="1">

Agile Toolkit is a PHP web framework with a particularly powerful ORM (Object-relational mapping) engine. This ORM goes much further beyond translating your data records into objects. It is fluent with joins, expressions, conditions and subqueries helping developer to take full potential of SQL engine through object-oriented interface.

To help illustrating some of these features, I have created a new enhancement to the [Agile Toolkit Kitchen Sink project](http://sink.agiletoolkit.org/). The best part, you can download this project and explore it on your laptop, [it's available on GitHub](https://github.com/atk4/sink).

For data I decided to use a [standard test_db repository](https://github.com/datacharmer/test_db), that creates about 300,000 employee records in the database along with 2,8 millions of salary records. The data is relational and can be seen in the following ER Diagram:

![image](blog-images/employees-db.png){.atk-expand}


Within just 3 hours of coding, I've managed to build an interface where a user can find answers to various questions such as:

 - What is a current salary of a specific employee
 - What was employee salary for a specific date in time
 - What was average employee salary at the time of hiring
 - Who was hired with a largest salary
 - How many employees were working during 1 jan of 1995
 - And many other questions.

The interface for pulling all this data is really simple:

![image](blog-images/employees-ui.png){.atk-expand}


And a LIVE DEMO is also available: [http://sink.agiletoolkit.org/employees/browse](http://sink.agiletoolkit.org/employees/browse)

Read my new blog article where I'll look into some of the implementation details, that can be invaluable for you if you want to learn Agile Toolkit better.


</div>
  <p><a href="{page}blog/real-life-db-agile-toolkit-example{/}">Read more..</a></p>
</article>



<article class="atk-box-large">
  <div class="atk-push">
    <h3 class="atk-text-baseline-default atk-push-reset"> <a href="{page}blog/announcing-split-of-dsql-from-agile-toolkit{/}">Announcing split of DSQL from Agile Toolkit</a></h3>
      <div class="atk-text-dimmed">Published in Blog on 29/01/2016</div>
  </div>
<div markdown="1">
[DSQL](https://book.agiletoolkit.org/model/dsql.html) is a SQL Query Builder of [Agile Toolkit](https://agiletoolkit.org/) - an object-oriented library which helps your PHP application reliably build "SELECT .. FROM .. WHERE .." queries.

DSQL is about to become a stand-alone component. As the part of our Agile Toolkit roadmap we will be moving DSQL, ORM and CSS into their own open-source projects. This change will help us improve the foundation of our framework.

**I am looking for open-source enthusiasts** who would like to help me with this project. If you would like to help - read my article and fill out simple form at the bottom.

</div>
  <p><a href="{page}blog/announcing-split-of-dsql-from-agile-toolkit{/}">Read more..</a></p>
</article>

<article class="atk-box-large">
  <div class="atk-push">
    <h3 class="atk-text-baseline-default atk-push-reset"> <a href="{page}blog/agile-css-framework-explores-data-attribute-styling-modifiers{/}">Agile CSS Framework explores data-* attribute styling modifiers</a></h3>
      <div class="atk-text-dimmed">Published in Blog on 12/01/2016</div>
  </div>
<div markdown="1">

Traditionally CSS frameworks have relied on ability to combine multiple CSS classes for widget styling. While one class may specify the name of the widget (dropdown-menu), a supplimentary class (dropdown-menu-right) will define some property such as positioning of a menu:

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

The heavy focus on "modifiers" makes one of the unique points of [Agile CSS](http://css.agiletoolkit.org/) - ability to design entirely new widgets with very little additional CSS code and by focusing of re-usability. This approach have proven to be quite effectie at designing custom layouts, custom widgets and custom color schemes.

I know the author of Agile CSS pretty well and in the latest branch he has started using a new way of specifying CSS modifiers through *data-XX* attributes. This produces a cleaner HTML code and has also reduces size of your `style.css` file. Here is the HTML example which is using new style modifiers:

``` html
<span class="atk-swatch-green" data-shape="circle"
    data-padding="all-xs" data-text="baseline-reset"
    data-border="outline"></span>
```



  </div>
  <a href="{page}blog/agile-css-framework-explores-data-attribute-styling-modifiers{/}">Read more..</a>
</article>

<article class="atk-box-large">
  <div class="atk-push">
    <h3 class="atk-text-baseline-default atk-push-reset"> <a href="{page}blog/replace-your-webserver-with-dokku-alt{/}">Replacing your old Webserver with Dokku-alt — The open-source Heroku Alternative</a></h3>
      <div class="atk-text-dimmed">Published in Blog on 03/01/2016</div>
  </div>
  <p>
    During the last few years I have migrated all my web applications from a classic LAMP server setup into Ubuntu running Dokku-alt PaaS manager. Despite some strong benefits there are very few articles/tutorials on how to configure and get your web apps running. This week I am writing about fundamental differences, benefits and challenges as you try out to build your own PaaS.

  </p>
  <a href="{page}blog/replace-your-webserver-with-dokku-alt{/}">Read more..</a>
</article>
