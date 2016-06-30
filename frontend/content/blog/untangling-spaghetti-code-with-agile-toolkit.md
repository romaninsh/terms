# Untangling Spaghetti Code

A few months ago my oldest web application was replaced after it was in daily use over 15 years unchanged. An extreme case, no doubt. 

Most web apps, if not looked after properly, may gradually become more and more difficult to maintain. This gradual erosion slowly changes your application into a bowl of spaghetti code.

What causes deterioration? How to prolong the life of your code? How to make it more maintainable? In this article, I'm sharing some of my findings and future plans that may give you a great solution for the problem.

## What causes code rot?

When we, developers, work on commercial projects we face many challenges in the form of deadlines, change requests and bad 3rd party code. Those cause us to produce suboptimal code.

There are numerous guides on how to properly design and document your code, but our circumstances are not ideal and realistically we not be able to follow best practices.

### Agile Methodology could be a culprit

Following Agile Manifesto can backfire when under time pressure or when the code is coded poorly. Developers may be pressured by some of the factors such as:

 - unclear requirements
 - significant change requests
 - limited developer budget
 - over-engineered solution
 - lack of code consistency

### Inconsistent Development Styles

Having multiple developers with different coding standards and limited communication between the team can also result in all kinds of holes in your code or code duplication. 

You might have had experience with maintaining the code left to you by some other developer and instead of trying to figure out his approach, you would use your own, different approach. 

### Supporting poor code

Sometimes we have to work with the code (or API) that cannot be changed and that is designed poorly. That forces us to make workarounds and hacks that further complicate the matters.

### Use of obsolete frameworks

When working on a software we rely on libraries and frameworks to do some work for us. If the framework is poorly designed or documented this can also lead to irregular code.

## How not to solve the problem

In most common scenario the code will continue to exist until it's fully rewritten into a more modern "framework". In my experience a full rewrite is an undesirable strategy by businesses as it has a lot of downsides:

 - huge development cost
 - very problematic Q/A
 - stability risk when deploying
 - costly technological transition

The other extreme is forking and freezing of the older frameworks as well as adopting the policy to "change as little as possible" to avoid breaking things. This can work more cost-efficiently but places a burden of supporting all 3rd party code on your shoulders.

## What would be an ideal solution?

Theoretically speaking, there is an ideal solution on how to deal with your spaghetti code problem. First, I'm going to define the criteria as to what I think could be the ideal solution:

### 1. The Application should stay functional

Web app business may suffer from big leaps and fundamental changes. The changes should be gradual and should have a minimum impact on the application.

### 2. We need to use compatible platform

A significant change in the technology can be harmful. If your application is written in WordPress then converting it to Symfony may not work well with your existing code. This change must be done in a more gradual transition using the framework that can integrate well into your existing app.

### 3. Your refactored code must be very clean

Replacing spaghetti code with noodle code is bad. When you put effort into improving your application, you must make sure it will remain untangled for years to come.

### 4. Consistency

Above all things, your new code must be consistent. If you start to refactor and stop it mid-way you may end up with a more horrifying situation. The course you decide to take should be able to take you all the way.

## Consider Agile Toolkit (4.4)

Given my experience of creating one of the most popular PHP UI frameworks - Agile Toolkit - that has been public use since 2011, I wanted now to specifically address the "legacy code" problem inside your current applications.

Currently in the works are the three major components that will make Agile Toolkit 4.4 and that can be used universally:

 - Agile Data - a stand-alone framework for designing clean business logic and database interactions.
 - Agile UI - a  framework for building consistent and modern web UI.
 - Agile Platform - a collection of add-ons, widgets and themes to further enhance your UI.
 
### 1. Gradually clean up your business logic

A clear implementation of the business code inside your application is crucial for integrity and stability. Agile Data is a low-level framework that is designed to improve how your code communicates with databases.

Think of Agile Data as a modern and simpler version of "Doctrine" with the simplicity of a traditional ORM and performance of a query builder. 

It is really simple to start using Agile Data:

    composer require atk4/data

You can then follow the "Getting Started" guide to designing your business logic. Here are some of the implications:

 - your database schema remains the same
 - you existing code remains in working condition
 - your new code is more efficient, shorter and more readable
 - your new "logic" can be used anywhere inside your legacy app
 - a fully testable code

As you follow through the clean-up process, you will be able to rip through your legacy code and replace it with the elegant, concise, consistent and high-performance alternative.

Agile Data is an on-visual framework. It acts as an abstraction layer between your "Presentation" and "Storage". With Agile Data in the middle and your business logic based on Agile Data, you will be able to easily change either "Presentation" or "Storage" sides of your code. For example, you could [de]normalise your database or shift some of your data into a NoSQL.

#### How can your code remain clean with Agile Data

Agile Data uses next generation  database abstraction logic that is superior to traditional ORM / ActiveRecord / Query Builders. At the same time, the use of Agile Data is simple and straightforward:

1. Easy to learn, understand, read, change and debug.
2. Takes advantage of your database. SQL-compatible features such as grouping, conditioning, joins, unions and sub-queries will be automatically used when needed.
3. Your operations with a database are more "declarative" in nature.

After declaring your basic business entities such as "Client", "Invoice" and "Payment" you can operate with Data Sets: "VIP Client", "Paid Invoice" or "Payment of VIP Client". Correct use of conditioning will keep your code lightweight and efficient.

The feature for "Expressions" and "Model Joins" in Agile Data will give you the ability to take full advantage of your SQL database performance and execute fewer queries. With expression, you can define a read-only expression field for Client showing total amount across his unpaid invoices without additional queries or complicated logic.

The other typical "problem" in the application is data aggregation. Traditionally this is the place where you either use ORM inefficiently or create custom queries to your database containing complex grouping, unions or stored procedures. Agile Data uses concepts of derived models to construct aggregate queries based on business logic you have defined. This way you can take advantage of conditioning, expressions or even another aggregates to declare new data models. 

Ultimately you can have 'Model_Client' object that can access and modify client data and 'Model_Report_ClientStatement' object that gives you client balances considering their payments and invoices. Both of the above objects having the same interface and relying on a single SQL query and offering you ability to shift some of your data from SQL into NoSQL seamlessly and without losing in performance. 

#### Current Status of Agile Data

At this time I'm working hard on implementing Agile Data framework. It is similar to the Model implementation in the earlier version of Agile Toolkit but it includes few amazing improvements. I invite you to try out some of our early versions or read through documentation:

http://github.com/atk4/data

The framework will be complete by the end of summer 2016.


### 2. User Interface - Out of the box

Agile UI is an open-source framework for developing modern Web User Interface. Fully integrated with the responsive CSS and HTML templates, with Agile UI you can easily create and expand the UI of your web application with a simple and clean code:

```
$toolbar->add('Button');
```

The Agile UI will automatically integrate with Agile Data and offer you ability to link forms, grid or CRUD directly with your business logic. Moreover, you can use buttons and real-time console to execute the business action and engage in AJAX-level communication between the browser and your back-end.

With full integration into jQuery UI, you can design amazingly responsive user interfaces without ever touching HTML or JavaSript. The out-of-the-box user interface has been one of the strong points of Agile Toolkit for the last 5 years.

The most convenient place to try the new UI is actually your "admin" system. Thanks to bundled widgets you can re-create your older admin system within hours. 

### 3. Frontend Design and Widgets

The same UI engine is sufficiently powerful to replace your front-end UI. You will have to do some theming (by either making your own theme or picking existing one) as well as making use of some clever widgets or add-ons (such as gallery, file-upload or 2-factor authentication).

The consistency of your Data and UI allows us to develop and offer you a wide range of UI add-ons. To simplify distribution, installation and configuration of those add-ons we are working on Agile Platform which is like Drupal add-on management system for your app. 

Agile UI and Agile Platform are planned to be released by the end of 2016. 

## Early Beta

My team is looking for developers that can help us test early versions of Agile Data and Agile Toolkit and Agile Platform. In exchange for your involvement, we are willing to give you access to some commercial widgets, themes and add-ons, training materials or commercial support. You need to provide your details and we will email you further information:

http://goo.gl/forms/gXTiRrd7SOyENpLs1

