---
title: History of Agile Toolkit
date: 2016-03-14
tags:
  - test
draft: false
---

Agile Toolkit is my software project that I have started all the way back in 2000 and has been in my care for almost 2 decades now. This projects reflects my desire to simplify life of a web developer and introduce some unique concepts in web development.

## What Motivated me to create Agile Toolkit?

Agile Toolkit was created to solve the re-usability problem as I was having while creating series of admin interfaces for a rather simple websites. All of those sites would implement interface where certain type records had to be listed, created, deleted and modified. In a modern days we call this a CRUD (Create, Read, Update, Delete), but back in 2000 this rather new concept. Eventually more modules were added allowing more than the 4 basic actions which resulted in the early name of the framework: "a-modules".

## What Shaped Agile Toolkit

In 2003 I have started a major rewrite and thinking about the new concept of writing web application. Object Oriented programming was finally ariving into PHP with the up-coming release of PHP5. I have implemented a whole new way to develop administration interfaces in a new and unique way. 

<!-- excerpt -->

I used my experience from early desktop environments and toolkits and decided that Objects can similarly be added inside pages and Pages can nicely exist inside the appliction itself. This concept is still used in Agile Toolkit and is called "Runtime Render Tree". This effectively introduces and separates 2 processes in your web applicatino:

 - Initialization
 - Rendering
 
This concept is still used in Agile Toolkit today. This is the sample form and page implementaiton from AModules-2:

``` php
<?
/**
 * This is default login page
 *
 * @author		Romans <romans@void.lv>
 * @copyright	(c) 2003 by Romans
 * @version		$Id: Login.php,v 1.1 2003/10/03 13:04:38 romans Exp $
 * @package		Package
 */
class pLogin extends Page {
    function checkAuth(){
        return true;
    }
    function init(){
        parent::init();
        $this->addForm('Login');
        $this->title='Login';
    }
}
?>
```

This file makes use of a form "Login" which is defined and located in ""form/Login.php":

``` php
<?
class Login extends Form {
    function init(){
        global $db;
        parent::init();
        $this -> add('line','login','User ID',null,null);
        $this -> add('password','password','Password');
        $this -> addButton('submit','images/sign-in-generic.gif');
    }
    function submited(){
        global $api;
        parent::submited();
        if($GLOBALS['ref']['auth']->check(
                                          $_POST['login'],
                                          $_POST['password'])){
            $api->redirect('Index',array('frame_mode'=>'frames'));
        }else $GLOBALS['page']->error = 'Authorization incorrect';
    }
    function draw_default($xtra = array()){
        return parent::draw_default(array_merge($xtra,array('size'=>30)));
    }
    function render(){
    	echo "<script>if(top.location != this.location){top.location = this.location;}</script>";
        parent::render();
        echo "<script>document.forms[0].password.focus()</script>";
    }
}
```

### How did Agile Toolkit changed over the time?

Quite soon I have realised that it's not only the form that you might need on the page and that extending "Lister" from "Form" is a bad idea so the Agile Toolkit framework was changed significantly one last time. This time I have introduced a "View" class which has become the cornerstone of all the application visual structure in AModules3.

Additionally version 3 finally included template parser, models, javascript integration and many other features we know from a modern Agile Toolkit. 


When Agile Toolkit 4.0.1 was released it had very limited documentation: https://github.com/atk4/atk4/tree/release-4.0.1/doc. This caused a lot of problems for new developers until a more comprehensive documentation started to emerge. 

I continued to dedicate my free time to document more features: http://web.archive.org/web/20140701081635/http://agiletoolkit.org/whatsnew/feb2011

### How is Agile Toolkit changing today?

The core of the framework has been stable since 2011 and while more features are added, the core of the framework remains un-changed. In 2013 I have started working on a 4.3 branch in Agile Toolkit that has incorporated a lot of public feedback and some contributions.


The new branch have been in active use through our internal projects and eventually went live as a stable release in 2015.

https://github.com/atk4/atk4/blob/4.3.2/CHANGES.md#major-changes-42-to-43

Since this milestone I have been putting my time into further sustainability of the framework, enterprise support and education. 


## Thanks to Contributors

Agile Toolkit would not be possible without contributions. I would like to offer a big thanks to anyone who have contributed code back into the framework, developed projects on it or even provided some feedback. 

