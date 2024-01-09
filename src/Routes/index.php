<?php

use App\Controllers\HomeController;
use App\Router;

$router = new Router();

$router->get('/', HomeController::class, 'index');

$router->get('/signup', HomeController::class, 'signup');
$router->get('/login', HomeController::class, 'login');
$router->get('/user', HomeController::class, 'user');
$router->post('/insert', HomeController::class, 'insert');


$router->dispatch();
