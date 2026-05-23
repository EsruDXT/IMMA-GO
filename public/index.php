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
$router->add('GET', '/profile/student-activities', 'ProfileController', 'studentActivities');

// Admin Events Page
$router->add('GET', '/admin/events', 'Admin\EventsController', 'index');

$router->add('GET', '/admin/events/create', 'Admin\EventsController', 'create');

$router->add('POST', '/admin/events/store', 'Admin\EventsController', 'store');

$router->add('GET', '/admin/events/edit/{id}', 'Admin\EventsController', 'edit');

$router->add('POST', '/admin/events/update', 'Admin\EventsController', 'update');

$router->add('GET','/admin/events/delete/{id}','Admin\EventsController','delete');

// User Management
$router->add('GET', '/admin/users', 'Admin\UserController', 'index');

$router->add('GET', '/admin/users/create', 'Admin\UserController', 'create');

$router->add('POST', '/admin/users/store', 'Admin\UserController', 'store');

$router->add('GET', '/admin/users/edit/{id}', 'Admin\UserController', 'edit');

$router->add('POST', '/admin/users/update', 'Admin\UserController', 'update');

$router->add('GET', '/admin/users/delete/{id}', 'Admin\UserController', 'delete');

// Competition Routes
$router->add('GET', '/competition/anak-ayam', 'CompetitionController','anakAyam');

$router->add('GET', '/competition/protect-the-queen', 'CompetitionController', 'protectTheQueen');

$router->add('GET', '/competition/cup-of-chaos', 'CompetitionController', 'cupOfChaos');

// Registration Routes
$router->add('GET', '/event/register', 'EventsController', 'register');

$router->add('POST', '/competition/store', 'CompetitionController', 'store');

$router->add('GET', '/competition/detail/{id}', 'CompetitionController', 'detail');

// Management Routes
$router->add('GET', '/admin/manage', 'Admin\ManageController', 'manageView');

// Admin Honors
$router->add('GET', '/admin/honors', 'Admin\HonorController', 'index');

$router->add('GET', '/admin/honors/create', 'Admin\HonorController', 'create');

$router->add('POST', '/admin/honors/store', 'Admin\HonorController', 'store');

$router->add('GET', '/admin/honors/edit/{id}', 'Admin\HonorController', 'edit');

$router->add('POST', '/admin/honors/update/{id}', 'Admin\HonorController', 'update');

$router->add('GET', '/admin/honors/delete/{id}', 'Admin\HonorController', 'delete');

//Honors Likes
$router->add('POST', '/honors/like/{id}', 'Admin\HonorController', 'like');

//User Honors
$router->add('GET', '/honors', 'Admin\HonorController', 'index');

$router->run();
