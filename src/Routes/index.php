<?php

use App\Controllers\Category;
use App\Controllers\Dashboard;
use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\SignupController;
use App\Controllers\TestController;
use App\Router;

$router = new Router();

$router->get('/', HomeController::class, 'index');
$router->get('/dashboard', Dashboard::class, 'index');
$router->get('/category', Category::class, 'category');
$router->get('/categoryadd', Category::class, 'categoryadd');
$router->post('/categoryadd', Category::class, 'categoryadd');
$router->get('/user', HomeController::class, 'user');
$router->post('/insert', HomeController::class, 'insert');

$router->get('/login', LoginController::class, 'show');
$router->get('/signup', SignupController::class, 'show');
$router->get('/test', TestController::class, 'add');
$router->dispatch();
