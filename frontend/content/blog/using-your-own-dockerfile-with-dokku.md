## Using your own Dockerfile with Dokku

In this post I'm sharing some of my best practices in using dokku-alt for deploying web apps that I develop commercially.

### Heiroku, Dokku vs Dokku-alt

Dokku has been created as a bash-script replacement for Heiroku deployment environment. While Heiroku business model only allows to deploy wide range of applications into their environment, Dokku was created as compatible alternative that you can install on your Ubuntu server.

Dokku comes with only the basic functionality and relies on 3rd party plugins to extend and add additional functionality through a number of "hooks", e.g. when your application is being deployed or when a certain command is executed.

Dokku-alt has been created as a fork that merges some of the essential functionality directly into distribution and makes sure that user does not have to look for plug-ins and instead can have a good out-of-the-box experience.

While in theory one should be able to use "dokku" plugins with "dokku-alt", both projects have diverged and I have been leaning towards the simple and reliable experience of dokku-alt despite it's slow/stalled development pace.

In my article I'll be using Dokku-alt, while the same can be done with original "dokku" through some intense plug-in configuration.

### How is Dokku-alt different to your regular webserver?

**1. Containers**

The time when you FTP into your webserver to perform a change on a file is long over. We all know that this results in error on your production website, differences between your local and live files and many other issues.

With Dokku-alt you no longer change files on your server, instead of you "deploy" by building your application into a "container", which will then act as a read-only virtual machine. When you decide to update your software, you will have to deploy your application again creating new container that will entirely replace the old one.

**2. Forward Proxying**

Previously you had to enable support for all the programming languages you were planning to use on your server. With dokku-alt your webserver is a simple reverse proxy (implemented by Nginx). Different containers can run different language interpreters and even different operating systems an as long as they expose port 80 it will be attached to a URL on your webserver.

This improves reliability and allows you to run 10 different PHP versions on the same server without any issue.

**3. Access Control**

The deployment is performed through a "git push" mechanics. Your local repository needs a new remote added:

```
git remote add deploy dokku@my.dokku-alt.com:my-app-name
git remote deploy master
```

Git software will use your SSH key to connect to `my.dokku-alt.com` server and deploy an application with `my-app-name`. It will most likely appear under a URL `http://my-app-name.my.dokku-alt.com`, but you can further configure it with a different domain.

The SSH key you are using to push (it's public part to be precise) must be known to dokku-alt server. You can add a new key with:

```
dokku deploy:allow my-app-name
```

One app may have multiple deploy keys and even though those users have access to "deploy", they won't have any means to connect to server shell or change anything.

**4. Services and CRON jobs**

Policy of running ALL of your software inside containers requires you to place your cron jobs, daemons and other applications you may require inside containers also. This may be a challenging task at first, but eventually you will enjoy the cleanleness and a much more improved organization between different components of your application.  

**5. Read-only nature of your app**

While you can still `enter` your containers and change files, you will need to stop doing that, as all your changes inside container will be wiped with next deploy. You can create a persistent *volume* inside your container (if you need to store images or file data)


### Buildpacks vs Dockerfile








Dokku and dokku-alt are mini-PaaS solutions for your Ubuntu server essentially helping you deploy your websites into isolated container. Your Ubuntu Linux running on DigitalOcean $10/m droplet could have dozens of "apps" running with ease.

Dokku-alt handles the deployment of the application, if it is a web application, it will associate it with domain / URL and will keep looking after things like domain redirects, aliases, https certificates and deploy access rights.

In my work I'm mostly using PHP applications written in [Agile Toolkit](http://agiletoolkit.org/). A single application contains multiple "interfaces" - frontend, backend and quite often will also have an "api" end-point.
