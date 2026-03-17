<?php
require_once '../app/core/Router.php';

use App\Core\Router;

$router = new Router();

//Home page 
$router->add('GET', '/homepage', 'homepageController', 'homepageview');

//Event page
$router->add('GET', '/event', 'eventController', 'eventview');




$router->run();
