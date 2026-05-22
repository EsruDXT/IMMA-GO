<?php
require_once '../app/core/Router.php';

use App\Core\Router;

$router = new Router();

// Register Route

//login 
$router->add('GET', '/login', 'AuthController', 'loginView');
$router->add('POST', '/login', 'AuthController', 'login');
//register
$router->add('GET', '/register', 'AuthController', 'registerView');
$router->add('POST', '/register', 'AuthController', 'register');
//logout
$router->add('GET', '/logout', 'AuthController', 'logout');
// Home Page
$router->add('GET', '/home', 'HomeController', 'homeView');

// Events Page
$router->add('GET', '/events', 'EventsController', 'eventsView');

$router->add('GET', '/event/{id}', 'EventsController', 'detail');

$router->add('GET', '/event-detail', 'EventController', 'detail');

$router->add('GET', '/events/create', 'AddEventController', 'addEventView');
// Profile Page
$router->add('GET', '/profile', 'ProfileController', 'profileView');

// Honors page
$router->add('GET', '/Honors', 'HonorsController', 'HonorsView');

$router->run();
