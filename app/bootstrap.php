<?php

$timer = microtime(true);

use \App\Lib\App;
use \App\Lib\Model;
use \App\Lib\PdoFactory;

// Rquire composer autoload class
// With this class we don't need to build a custome Autoloader class
require '../vendor/autoload.php';

// Database connection 
require 'config.php';

// dev|prod mode
// production mode = true => hide errors
// development mode = false => show errors
$mode = isProductionMode(false);


// Application class
// $app = new App\Lib\App;
$app = App::getInstance();

// Inject the PDO object in the model class
Model::setPDO( PdoFactory::mySqlConnection() );


// Section of the Main Classes
$sessionHandler = $app->set('sessionHandler', 'App\Lib\AppSessionHandler');
$cache 			= $app->set('cache',          'App\Lib\Cache');
$router 		= $app->set('router',         'App\Lib\Router');
$controller 	= $app->set('controller',     'App\Lib\Controller');
$model          = $app->set('model',          'App\Lib\Model');






// Section of controllers
$posts = $app->set('posts', 'App\Controllers\PostsController');
$categories = $app->set('categories', 'App\Controllers\CategoriesController');
$users = $app->set('users', 'App\Controllers\UsersController');




// here we start the application
$router->route($app);



if($mode == false) {
    $time = (microtime(true) - $timer);
    echo "<div class='text-center navbar navbar-fixed-bottom navbar-default'>
            <i class='fa fa-dashboard'></i> This page is loaded in " . round($time, 4) . " seconds.
        </div>";
}



