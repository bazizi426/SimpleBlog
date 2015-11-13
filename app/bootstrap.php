<?php

// store the time
$timer = microtime(true);

// Start session
session_start();



// Rquire composer autoload class
// With this class we don't need to build a custome Autoloader class
require '../vendor/autoload.php';

// Database connection 
require 'config.php';

// ( development OR production ) mode
// If the argument passed is true so all errors are displayed off
// If the argument passed is false so all errors are displayed on
$mode = isProductionMode(false);


// Singletoone Design pattern
// Application class
$app = \App\Lib\App::getInstance();

// Dependency injection design pattern
// Inject the PDO object in the model class
\App\Lib\Model::setPDO( \App\Lib\PdoFactory::mySqlConnection() );


/**
|========================================================
|                  Main Classes
|========================================================
 */
// Router's object
$router 		= $app->set('router',         'App\Lib\Router');

// Controller's object
$controller 	= $app->set('controller',     'App\Lib\Controller');

// Active Record design pattern
// Model's object
$model          = $app->set('model',          'App\Lib\Model');



/**
 |========================================================
 |                  Controllers
 |========================================================
 */
$posts      = $app->set('posts', 'App\Controllers\PostsController');
$categories = $app->set('categories', 'App\Controllers\CategoriesController');
$users      = $app->set('users', 'App\Controllers\UsersController');




// Start application
$router->route($app);


/**
 * This condition is used to show the bottom navigation bar
 * the navgation bar containes the time for loading a page
 * Its display on in development mode : isProductionMode(false)
 * but in production mode its desplay off : isProductionMode(true)
 *
 * In this application, by default the isProductionMode is set to false
 * so all errors apear
 */
if($mode == false) {
    $time = (microtime(true) - $timer);
    echo "<div class='text-center navbar navbar-fixed-bottom navbar-default'>
            <i class='fa fa-dashboard'></i> This page is loaded in " . round($time, 4) . " seconds.
        </div>";
}



