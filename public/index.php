<?php
require_once '../app/core/Router.php';

use App\Core\Router;

$router = new Router();

// Register Route

// Login Page
$router->add('GET', '/login', 'AuthController', 'loginView');

// Register Page
$router->add('GET', '/register', 'AuthController', 'registerView');

$router->add('GET', '/', 'HomeController', 'homeView');
$router->add('GET', '/home', 'HomeController', 'homeView');
// Manage Product

// Daftar Produk
$router->add('GET', '/products', 'ProductController', 'index');

// Tambah
$router->add('GET', '/products/create', 'ProductController', 'create');

// Edit
$router->add('GET', '/products/{id}/edit', 'ProductController', 'edit');

// Detail
$router->add('GET', '/products/{id}', 'ProductController', 'show');

//Event Detail
$router->add('GET', '/event-detail', 'EventController', 'detail');






$router->run();
