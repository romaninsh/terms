# Announcing split of DSQL from Agile Toolkit

As the part of our movement towards more modular Agile Toolkit we will be doing several changes to our framework in 2016. The highest priority on our list is moving DSQL module into the project of it's own.

We are going to position DSQL as alternative to [FluentPDO](http://lichtner.github.io/fluentpdo/), [Pixie](https://github.com/usmanhalalit/pixie), [Idiorm](https://github.com/j4mie/idiorm) (etc) while maintaining it's MIT license, extensive feature set and it's 10 years of stability since [it was released as part of AModules3 in 2006](http://sourceforge.net/projects/amodules3/).

The purpose of this separation is to build a better community around this project, encourage community contributions and focus on new integration with a new Semi-SQL database engines and 3rd party PHP frameworks.

## Why is DSQL relevant?

For those who are not familiar with DSQL in Agile Toolkit, I'm including some of the major features and code examples.

The core features include:

 * Object-oriented query interface (clone-safe)
 * Full JOIN support
 * Automatic escaping and sanitization of parameters
 * Full expression support in conditions, fields or anywhere else
 * Merging of independent query objects together
 * Updates, Deletes, Grouping and user-defined queries
 * Support for SQL vendor-extensions
 * Various data fetching models and lastly
 * Handling of vendor-specific quirks

Below is example on how you can use condition to fetch table row:

``` php
$row = $db->dsql()
    ->table('user')
    ->where('email', $email)
    ->getRow();
```

Dynamic queries can also be used for iteration. Multiple queries can exist at the same time:

``` php
foreach(
    $db->dsql()
        ->table('basket')
        ->where('user_id', $user_id)
    as $row) {
   ...
}
```

Expressions allow safe use of arguments and re-use of query objects inside
other queries:

``` php
$q->table('order')
  ->where('expiration','<',$q->expr('now()'))
  ->set('name', 
      $q->expr(
          'CONTACT("Expired on ", [0], ": ", name)',
          [$date]
      ))
  ->do_update();
```
  
Ultimatly, DSQL is invaluable when used as a part of a higher-level ORM framework:

``` php

 $m_user->addField('name');
 $m_user->hasMany('Order');
 $m_user->addExpression('total_orders')->set(function($m,$q){
    return $q->expr('COALESCE([in],0) - COALESCE([out],0)', [
      'in'=>$m->refSQL('Order')->addCondition('type','purchase'),
      'out'=>$m->refSQL('Order')->addCondition('type','sale'),
    ])
 });
 
 echo 'Total orders for user 123: '.$m_user->load(123)['total_orders'];
 ```
 

## Improvements to project authorship and practices

While I was the author of the DSQL and sole decision maker in the past, for the new project I want to appoint board of 5 governors with responsibility to vote on major decisions and have sufficient power to accept change requests and contributions into DSQL. 

If you have some experience with DSQL, you might be a good candidate -- continue reading. You will find a link to an application form at the end of my blog post.

For those who DO NOT want to take on any responsibilities, I am still willing to invite you to our [Slack](https://slack.com) team chat, where you can participate in discussions and provide valuable feedback or simply just hang out with smart people.

We will keep making sure that the elected 5 governors are active and working towards the goal of the project or otherwise give up their chair to someone else who would be able to better carry out the responsibilities.

### Test-script-first strategy

The new project will embrace the industry-standard testability, code-coverage and documentation practices from day one. Instead of simply copy-pasting our DSQL source code, features will be ported gradually while being carefully reviewed and reconsidered. All new code additions will land into repository through a series of "feature-requests".

### Pull-request policy

The project will adopt a pull-request-only policy, where all the changes must be properly approved by a member of a board (other than a contributor) before it can be integrated into mainstream.

Each contribution must always come with documentation, test-cases, proper coding style otherwise it will be rejected. We will adopt PSR-x for coding practices and validate project through a series of 3rd party CI tools.

### Documentation

The documentation for DSQL project will not assume knowledge of Agile Toolkit and will be structured to be equally useful for all PHP developers, regardless of their framework choice. The documentation will be created and updated as more features are added, but it will be there at all times.

The format of the documentation will be RST (Sphinx) that will be automatically compiled and published on the site.

### Website, releases, Forum and Stack Overflow

We will build a good-looking dedicated homepage for DSQL, that would include an introduction to DSQL and refences to examples, documentation and direct download link.

DSQL will have frequent release cycle with decent changelogs. Agile Toolkit forum will have a dedicated tag for DSQL-related discussions. We will also register tag on Stack Overflow to provide community support to users of DSQL.


### Talks and Events

As a part of my [public speaking]({page}public-speaking{/}) I will be offering conferences to include my introductionary talk about DSQL.

If you are located near London and would like to get in touch with me in person to discuss this project or set up a user group, I will try my best to help.

## DSQL Goals

The initial aim of the project is to achieve compatibility with DSQL class that exists in Agile Toolkit right now and detach it from Abstract Object.

The secondary aim is to target new Semi-SQL databases such as [BigQuery](https://cloud.google.com/bigquery/query-reference?hl=en), [MemSQL](http://docs.memsql.com/4.0/ref/SELECT/) and [ClusterPoint](https://www.clusterpoint.com/docs/?page=SELECT_Basics) that implement a diversion of ANSI-SQL or add some new query features (such as JSON object support).

Once the initial structure to support a growing world of [Semi]-SQL databases has been covered, we will work towards stability and performance boost of the framework as well as integration with Agile Toolkit and other frameworks.


### DSQL integration with frameworks

The release of Agile Toolkit 4.0 and 4.1 marked a huge milestones in development of ORM / Model interface inside a framework. Those models have always relied on DSQL as a low-level query layer. One of the major goal of DSQL is to remain framework-friendly and able to serve as a foundation layer for a ORM-like classes.

Agile Toolkit integration would be the easiest goal, however we will have to explore integration options into other major PHP frameworks and products by working with their communities. If you, dear reader, are a member of an open-source community which might benefit from a DSQL Query Builder, we would be willing to give you our full support. 

### Enterprise support

Above all we are willing for DSQL to make it big inside companies and enterprises. With a great focus on stability and complex use cases and with added effort to code clarity and testability, we will ensure that our releases are stable and backwards compatible.

We have worked hard in 2015 to build a corparate structure around Agile Toolkit which will provide commercial support for DSQL project and will also act as a major sponsor and contributor of this project.

### Education

DSQL is already included in the curriculum of our [Agile Toolkit school](https://agiletoolkit.org/school/), but we will be looking to create a specific DSQL workshop programme, if there will be sufficient demand for it.


## Getting Involved

We need your help. Getting involved is a great way to learn and contribute to the world of Open Source. It will also open new opportunities for you.

<a class="atk-button atk-align-center atk-swatch-orange atk-size-mega" href="http://goo.gl/forms/uC7AKXU5Pn" target="_blank">Register your interest</a>