<?php namespace Config;

$routes = Services::routes(true)
    ->setDefaultNamespace('App\Controllers')
    ->setTranslateURIDashes(false)
    ->set404Override();

$routes->resource('user', [
    'filter' => ['is_authenticated', 'is_authorized'], 
    'controller' => 'UserController',
    'resource' => 'user',
]);

$routes->resource('profile', ['filter' => 'is_authenticated', 'controller' => 'ProfileController']);

$routes->post('/auth/login', 'AuthController::login');