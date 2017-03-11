# captaincode0-silex-skeleton

**Application skeleton for silex 1.3^ versions, now i have the problem, when i create a new web service, project, and/or application, i need to configure the framework again and again.**

##Installation

Firstly you must be composer installed localy in your computer, and run the following commands:

```bash
    git clone https://github.com/captaincode0/captaincode0-silex-skeleton.git
    cd captaincode0-silex-skeleton
    composer install
```

The second steep is run the Application Shell, to create the project structure, and you don't have to worry about configuration, fix permissions, and other horrible things.

```bash
    php src/console/app-shell.php project:setup --create
```

As you can see after the installation the following folders or directories:

Directory|Description
---|---
src|Contains the source of your application.
src/console|Stores shells and utilities based on symfony console.
src/core|Contains the services and http controllers used in your application.
views|Contains the the twig views in your application *(You have to configure twig)*
var/log|Contains the application logs.
var/cache|Contains the application cache when you use a reverse proxy or the webprofiler.
web/assets|In this folder you can save your css, js, and images, or whatever you want.

## Create your service and controllers

If you need to create one service and http controllers you just have to load or require the module in the files `src/core/controllers/ControllersLoader.php` and `src/core/controllers/ServicesLoader.php`.

If you have one controller like this one:

```php
    namespace MyApplication\Core\HttpController;
    
    use Silex\Application;
    use Silex\ControllerProviderInterface;

    class MyController implements ControllerProviderInterface{
        public function connect(Application $app){
            $controllers = $app["controllers_factory"];
        
            $controllers->get("/", function() use($app){
                return "Hello from my controller";   
            });
            
            return $controllers;
        }
    }
```

You have to load it as the following example, inside of the file `src/core/controllers/ControllersLoader.php`

```php
    require __dir__."/MyController.php";
```

When you have the controller loaded succesfuly, then you have to mount it inside the file `src/mount-controllers.php`

```php
    $app->mount("/myroute", new MyController());
```

**If at this point you don't have idea about what i am saying, read the documentation, or if you found a bug on my code, you are welcome to make an issue on github**