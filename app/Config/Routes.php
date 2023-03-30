<?php namespace Config;

$routes = Services::routes(true)
    ->setDefaultNamespace('App\Controllers')
    ->setTranslateURIDashes(false)
    ->set404Override();

$routes->resource('user', ['controller' => 'UserController']);
$routes->resource('profile', ['controller' => 'ProfileController']);

$routes->post('/auth/login', 'AuthController::login');