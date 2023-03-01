<?php

/*
|----------------------------------------------
| Routes Configuration
|----------------------------------------------
| 
| Here is where you can configuration 
| url web routes for your application.
*/

// static routes
$router->get('/', [HomeController::class, 'index']);
$router->get('/index', [HomeController::class, 'index']);
$router->get('/how-to-play', [HomeController::class, 'howto']);
$router->get('/faqs', [HomeController::class, 'faqs']);
$router->get('/contact-us', [HomeController::class, 'contact']);


//Authentication
$router->get('/login', [HomeController::class, 'login']);
$router->get('/register', [HomeController::class, 'register']);


// dynamic routes
$router->get('/realDynamo/{dynamo}', [HomeController::class, 'realDynamo']);
