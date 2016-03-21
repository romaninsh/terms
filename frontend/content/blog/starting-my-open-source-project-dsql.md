# Update on our Open-Source Project - DSQL

In [one of my previous posts](http://nearly.guru/blog/announcing-split-of-dsql-from-agile-toolkit) I have proposed to split a component that has been a part of our ATK library into a separate project called [DSQL](https://github.com/atk4/dsql). Me and [Imants](https://github.com/DarkSide666) have been [burning the midnight oil](https://github.com/atk4/dsql/graphs/punch-card) to move and refactor functionality into this separate project, and we have just [released the ALPHA1 version of the project](https://github.com/atk4/dsql/releases/tag/1.0.0-alpha).

With this blog post I want to share our progress and show you what we have accomplished in a few months.

## Pull-request based approach

As I've mentioned earlier, I wanted our project to be built through pull requests from the very beginning. This has been a really good success and it wasn't introducing any extra complexity, but instead it cleaned up the project flow and allowed us to focus on adding specific features. We have also started thinking "how do I structure code to make pull requests smoother".

![image](blog-images/pr-in-dsql.png)

## Pull-requests must have docs and test

We are using [sphinx-doc](http://www.sphinx-doc.org) to compile our documentation. It's quite easy to install locally and use a Makefile that will convert documentation from [RST format](https://raw.githubusercontent.com/atk4/dsql/develop/docs/quickstart.rst) into [HTML](http://dsql.readthedocs.org/en/latest/quickstart.html#getting-started). The use of sphinx-doc and php-domain extension makes it possible to perform cross-links between files and also reference and include [documentaiton for methods and properties.](http://dsql.readthedocs.org/en/latest/queries.html#Query::where), something like that would not be possible with Markdown.

The test-scripts are handled by PHPUnit and all the new functionality inside PR's are complimented with test-scripts as a rule. [That have also worked well](https://github.com/atk4/dsql/pull/20/files) and allowed us to maintain 70% test-coverage even while developing. We do intend to [raise the number up to 90%](https://github.com/atk4/dsql/issues/18) before [stable 1.0 release](https://github.com/atk4/dsql/milestones). 

## Automation all the way

We are relying on tools and services to help us out and automate as much work as possible. Our pull requests are submitted through (I recommend using [AVH version of "git flow"](https://github.com/petervanderdoes/gitflow-avh), as it is actively maintained).

Work on DSQL and it's branches is automatically [integrated with our Travis-CI](https://travis-ci.org/atk4/dsql/branches), which runs our tests and they both send [slack notifications](https://slack.com) to our team. During tests Travis-CI also sends [test-coverage statistics](https://codeclimate.com/github/atk4/dsql/coverage) to Code Climate.

While we are working on features, we maintain a stable "master" branch (black line in the image above) thas is updated on stable releases.

## Code Decisions

One of our goals of our DSQL project to maintain compatibility with the [Agile Toolkit](http://agiletoolkit.org/), but our other goals are [clearly stated in our README](https://github.com/atk4/dsql/#dsql). 

We have made the decision not to create our own Connection and ResultSet and instead rely on [PDO](http://php.net/manual/en/class.pdo.php) and [PDOStatement](http://php.net/manual/en/class.pdostatement.php) classes. This was possible without [compromise on the beautiful PHP syntax](http://dsql.readthedocs.org/en/latest/quickstart.html#fetching-result) our users have been familiar with for both [simple queries and complex queries](http://dsql.readthedocs.org/en/latest/quickstart.html#getting-started).

## Further Planning

We have put down a road-map and are working on clean-ups which will result in 1.0.0-beta. Once the beta is complete, I might be willing to tell more people about the DSQL project and it's benefits.

The DSQL project might not be for the average Joe Blogs, but I hope that some people will use it as a basis in their framework or an application. DSQL certainly has it's strong points and in my belief can remain strong against the competition.

Before the stable release, we will have to put a basic homepage together for this project. 

## Why DSQL

For us DSQL project is really important, because not only it's refactoring some of the fundmental components of Agile Toolkit, it does it in a very consistent and appropriate way. The DSQL project is also the first of two steps as we are porting Agile ORM into it's own project.

There are many believers who claim that ORM is anti-pattern, that it is bound to slow down your project and cripple your performance. Agile ORM is the solution but before we can start talking about it, it needs a solid foundation. By "solid" I mean with full documentation and test coverage.

As soon as DSQL hits 1.0, we will begin our work on Agile ORM. If you would like to stay informed, open [https://github.com/atk4/orm](https://github.com/atk4/orm) and "Follow" the repository.










