<?php namespace Config;
/**
 * @link https://codeigniter4.github.io/userguide/incoming/routing.html
 */

$routes = Services::routes(true)
    ->setDefaultNamespace('App\Controllers')
    ->setTranslateURIDashes(false)
    ->set404Override();

$routes->resource('user', [
    'filter' => ['is_authenticated', 'is_authorized'], 
    'controller' => 'UserController',
    'resource' => 'user',
]);

$routes->resource('profile/(:num)/permission', [
    'filter' => ['is_authenticated', 'is_authorized'], 
    'controller' => 'PermissionController',
    'resource' => 'profile',
]);

$routes->resource('profile', [
    'filter' => ['is_authenticated', 'is_authorized'], 
    'controller' => 'ProfileController',
    'resource' => 'profile',
]);

$routes->group('auth', ['filter' => 'is_authenticated'], static function($routes) {
    
    $routes->get('me', 'AuthController::me');
    $routes->post('verify', 'AuthController::verify');
    $routes->get('setting', 'AuthController::edit');
    $routes->post('setting', 'AuthController::update');
});

$routes->post('/auth/login', 'AuthController::login');