<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'HomeController::index'); 
$routes->get('about', 'HomeController::about'); 
$routes->get('products', 'ProductController::index'); 
$routes->get('login', 'LoginController::index'); 
$routes->post('login', 'LoginController::login'); 
$routes->get('logout', 'AuthController::logout'); 
$routes->get('register', 'RegisterController::index'); 
$routes->post('register', 'RegisterController::register'); 

$routes->group('admin', ['filter' => 'auth:admin'], function ($routes) {
    $routes->get('/', 'AdminController::index'); 

    $routes->group('products', function ($routes) {
        $routes->get('product/(:segment)', 'ProductController::detail/$1');
        $routes->get('/', 'AdminProductsController::index'); 
        $routes->match(['get', 'post'], 'add', 'AdminProductsController::add'); 
        $routes->match(['get', 'post'], 'edit/(:segment)', 'AdminProductsController::edit/$1'); 
        $routes->post('update/(:segment)', 'AdminProductsController::update/$1'); 
        $routes->delete('delete/(:segment)', 'AdminProductsController::delete/$1'); 
    });


    $routes->group('users', function ($routes) {
        $routes->get('/', 'AdminUsersController::index'); 
        $routes->match(['get', 'post'], 'edit/(:segment)', 'AdminUsersController::edit/$1'); 
        $routes->post('update/(:segment)', 'AdminUsersController::update/$1'); 
        $routes->delete('delete/(:segment)', 'AdminUsersController::delete/$1'); 
    });
});
