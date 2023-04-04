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

$routes->resource('profile', [
    'filter' => ['is_authenticated', 'is_authorized'], 
    'controller' => 'ProfileController',
    'resource' => 'profile',
]);

$routes->group('/profile/(:profile)', static function ($routes) {
    
    $routes->resource('permission', [
        'filter' => ['is_authenticated', 'is_authorized'], 
        'controller' => 'PermissionController',
        'resource' => 'permission',
    ]);
});



$routes->post('/auth/login', 'AuthController::login');