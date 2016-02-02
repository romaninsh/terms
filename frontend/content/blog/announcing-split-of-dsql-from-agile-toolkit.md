# Announcing split of DSQL from Agile Toolkit

[DSQL](http://book.agiletoolkit.org/model/dsql.html) is a SQL Query Builder of [Agile Toolkit](https://www.agiletoolkit.org/) - an object-oriented library which helps your PHP application reliably build "SELECT .. FROM .. WHERE .." queries.

DSQL is about to become a stand-alone component. As the part of our Agile Toolkit roadmap we will be moving DSQL, ORM and CSS into their own open-source projects. This change will help us improve the foundation of our framework.

**I am looking for open-source enthusiasts** who would like to help me with this project. If you would like to help - read my article and fill out simple form at the bottom.

## What is DSQL?

For those who are not familiar with DSQL in Agile Toolkit, I'm including some of the major features and code examples.

DSQL is an object-oriented interface to generating vendor-specifig query string:

 * Object-oriented query interface. Build and execute queries simultaneously.
 * Support for FROM, WHERE, JOIN, GROUP, ORDER and other basic keywords.
 * Automatic escaping and sanitization of parameters.
 * Nested query support FROM (SELECT ..) anywhere in your query.
 * Support for UPDATE, REPLACE, DELETE and INSERT queries.
 * Automatic merge of parametric variables in recursive expressions.
 * Extend to create your own query methods (ALTER, DESCRIBE, etc).
 * Support for SQL vendor-extensions (e.g. CALC_FOUND_ROWS).
 * Various data fetching models, iterator support.
 * Well suitable to be used in higher-level frameworks.
 * Stable code, in constant use for over 10 years since first version.

This is the most basic query example:

``` php
$row = $db->dsql()
    ->table('user')
    ->where('email', $email)
    ->getRow();

// SELECT * FROM `user` WHERE `email` = "[0]"
//
//  0 => $email
```

Dynamic queries can also be used for iteration:

``` php
foreach(
    $db->dsql()
        ->table('basket')
        ->join('item')
        ->field(['item_name'=>'item.name','qty'])
        ->where('user_id', $user_id)
        ->where('qty','>',0)
    as $row) {
   ...
}

// SELECT `item.name` AS `item_name`, `qty` FROM `basket`
//   JOIN `basket` ON `basket.id`=`item.basket_id`
//   WHERE `user_id` = [0] AND `qty` > [1]
//
// 0 => $user_id - escaped
// 1 => 0

```

Expressions allow safe use of arguments and re-use of query objects inside
other queries:

``` php
$q->table('order')
  ->where('expiration','<',$q->expr('now()'))
  ->set('name',
      $q->expr(
          'CONCAT("Expired on ", [0], ": ", name)',
          [$date]
      ))
  ->do_update();

// UPDATE `order`
//  SET `name` = CONCAT("Expired on ", [0], ": ", name)
//  WHERE `expiration` < now()
//
//  0 => $date - escaped
```

Ultimately, DSQL is invaluable when used as a part of a higher-level ORM framework:

``` php

 $m_user->addField('name');
 $m_user->hasMany('Order');
 $m_user->addExpression('total_orders')->set(function($m,$q){
    return $q->expr('COALESCE([in],0) - COALESCE([out],0)', [

      'in'=>$m->refSQL('Order')
        ->addCondition('type','purchase')
        ->sum('amount'),

      'out'=>$m->refSQL('Order')
        ->addCondition('type','sale')
        ->sum('amount')
    ]);
 });

 echo 'Total amount for user 123: '.$m_user->load(123)['total_orders'];


// SELECT (
//   COALESCE( (SELECT SUM(`amount`) FROM `order`
//       WHERE `user_id`=`user_id` and `type` = [0]), 0) -
//   COALESCE( (SELECT SUM(`amount`) FROM `order`
//       WHERE `user_id`=`user_id` and `type` = [1]), 0) )
//  FROM `user` where `id` = [2];
//
//  0 => "purchase"
//  1 => "sale"
//  2 => 123
 ```

The example above demonstrates how DSQL is integrated with [Agile ORM](http://book.agiletoolkit.org/model/sql.html). $m_user
refers to a basic SQL model associated with the table `user`. addExpression allows developer to define a sub-select by
traversing into related model and building a necessary DSQL expression, which is then merged into the main model query.

## How can we improve DSQL?

While I was the author of the DSQL and sole decision maker in the past, for the new project I would like to appoint a board of 5 governors with responsibility to vote on major decisions and have sufficient power to accept change requests and contributions into DSQL.

If you have some experience with DSQL, you might be a good candidate -- continue reading. You will find a link to an application form at the end of my blog post.

For those who DO NOT want to take on any responsibilities, I am still willing to invite you to our [Slack](https://slack.com) team chat, where you can participate in discussions and provide valuable feedback or simply just hang out with smart people.

We will keep making sure that the elected 5 governors are active and working towards the goal of the project or otherwise give up their chair to someone else who would be able to better carry out the responsibilities.

### Test-script-first strategy

The new project will embrace the industry-standard testability, code-coverage and documentation practices from day one. Instead of simply copy-pasting our DSQL source code, features will be ported gradually while being carefully reviewed and reconsidered. All the new code additions will land into repository through a series of "feature-requests".

### Pull-request policy

The project will adopt a pull-request-only policy, where all the changes must be properly approved by a member of a board (other than a contributor) before it can be integrated into mainstream. When the important decision needs to be taken, it can be done through a governor vote.

Each contribution must always come with documentation, test-cases and proper coding style otherwise it will be rejected. We will adopt PSR-x for coding practices and validate pull-request through a series of 3rd party CI tools.

### Documentation

The documentation for DSQL project will not assume knowledge of Agile Toolkit and will be structured to be equally useful for all PHP developers, regardless of their framework choice. The documentation will be created and updated as more features are added, but it will be there at all times.

The format of the documentation will be RST (Sphinx) that will be automatically compiled and published on the site.

### Website, releases, Forum and Stack Overflow

We will build a good-looking dedicated homepage for DSQL, that would include a good introduction, examples and up-to-date documentation with a direct download link.

DSQL will have a stable/unstable release cycle with decent changelogs. Agile Toolkit forum will have a dedicated tag for DSQL-related discussions. We will also register tag on Stack Overflow to provide community support to users of DSQL.

### Talks and Events

As a part of my [public speaking]({page}public-speaking{/}) I will be offering conferences to include my introductory talk about DSQL.

If you run an event or user-group and your members might be interested in the topic, contact me for more information and presentation slides.

## DSQL Goals

The initial aim of the project is to achieve compatibility with DSQL class that exists in Agile Toolkit right now and detach it from Abstract Object.

The secondary aim is to target new Semi-SQL databases such as [BigQuery](https://cloud.google.com/bigquery/query-reference?hl=en), [MemSQL](http://docs.memsql.com/4.0/ref/SELECT/) and [ClusterPoint](https://www.clusterpoint.com/docs/?page=SELECT_Basics) that implement a diversion of ANSI-SQL or add some new query features (such as JSON object support).

Once the initial structure to support a growing world of [Semi]-SQL databases has been covered, we will work towards stability and performance boost of the framework as well as integration with Agile Toolkit and other frameworks.

### DSQL integration with frameworks

The release of Agile Toolkit 4.0 and 4.1 marked a huge milestones in development of ORM / Model interface inside a framework. Those models have always relied on DSQL as a low-level query layer. One of the major goal of DSQL is to remain framework-friendly and able to serve as a foundation layer for a ORM-like classes.

Agile Toolkit integration would be the first goal, however we will explore integration options into other major PHP frameworks and products by working with their communities. If you, dear reader, are a member of an open-source community which might benefit from a DSQL Query Builder, we would be willing to offer you help in integration.

### Enterprise support

Above all we are willing for DSQL to make it big inside companies and enterprises. With a great focus on stability and complex use cases and with added effort to code clarity and testability, we will ensure that our releases are stable and backwards compatible.

We have worked hard in 2015 to build a corporate structure around Agile Toolkit which will provide commercial support for DSQL project and will also act as a major (but not the only) sponsor and contributor of this project.

### Education

DSQL is already included in the curriculum of our [Agile Toolkit school](https://agiletoolkit.org/school/), but we will be looking to create a specific DSQL workshop program if there will be sufficient demand for it.

## Getting Involved

We need your help. Getting involved is a great way to learn and contribute to the world of Open Source. It will also open new opportunities for you or your company.

<a class="atk-button atk-align-center atk-swatch-orange atk-size-mega" href="http://goo.gl/forms/uC7AKXU5Pn" target="_blank">Register your interest</a>

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
