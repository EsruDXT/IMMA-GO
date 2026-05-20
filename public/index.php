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
$router->add('GET', '/events', 'EventsController', 'index');

$router->add('GET', '/event/{id}', 'EventsController', 'detail');

$router->add('GET', '/event-detail', 'EventController', 'detail');

// Profile Page
$router->add('GET', '/profile', 'ProfileController', 'profileView');

// Admin Events Page
$router->add('GET', '/admin/events', 'Admin\EventsController', 'index');

$router->add('GET', '/admin/events/create', 'Admin\EventsController', 'create');

$router->add('POST', '/admin/events/store', 'Admin\EventsController', 'store');

$router->add('GET', '/admin/events/edit/{id}', 'Admin\EventsController', 'edit');

$router->add('POST', '/admin/events/update', 'Admin\EventsController', 'update');

$router->add('GET','/admin/events/delete/{id}','Admin\EventsController','delete');

$router->run();
