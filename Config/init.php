<?php
require_once 'autoload.php';
require_once 'helpers.php';
require 'vendor/autoload.php';
/**
 * Setting up the environment.
 */
create_env();
/**
 * Instance the router class
 */
$router = new Config\Router;
require_once 'App/Routes/index.php';
/**
 * Setting up the database.
 */
$dbcon = new Config\Db();
require_once 'Controller.php';

/**
 * Rendering to browser
 */
$router->render();