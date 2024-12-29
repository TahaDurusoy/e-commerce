<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Main Pages
$routes->get('/', 'HomeController::index'); // Home page
$routes->get('about', 'HomeController::about'); // About page
$routes->get('products', 'ProductController::index'); // Product listing
$routes->get('login', 'LoginController::index'); // Login page
$routes->post('login', 'LoginController::login'); // Login submission
$routes->get('logout', 'AuthController::logout'); // Logout functionality
$routes->get('register', 'RegisterController::index'); // Register page
$routes->post('register', 'RegisterController::register'); // Register submission

// Admin Panel Routes (Protected by AuthFilter for admin users)
$routes->group('admin', ['filter' => 'auth:admin'], function ($routes) {
    // Admin Dashboard
    $routes->get('/', 'AdminController::index'); // Admin panel dashboard

    // Product Management
    $routes->group('products', function ($routes) {
        $routes->get('product/(:segment)', 'ProductController::detail/$1');
        $routes->get('/', 'AdminProductsController::index'); // List products
        $routes->match(['get', 'post'], 'add', 'AdminProductsController::add'); // Add a product
        $routes->match(['get', 'post'], 'edit/(:segment)', 'AdminProductsController::edit/$1'); // Edit a product
        $routes->post('update/(:segment)', 'AdminProductsController::update/$1'); // Update a product
        $routes->delete('delete/(:segment)', 'AdminProductsController::delete/$1'); // Delete a product
    });

    // User Management
    $routes->group('users', function ($routes) {
        $routes->get('/', 'AdminUsersController::index'); // List users
        $routes->match(['get', 'post'], 'edit/(:segment)', 'AdminUsersController::edit/$1'); // Edit a user
        $routes->post('update/(:segment)', 'AdminUsersController::update/$1'); // Update a user
        $routes->delete('delete/(:segment)', 'AdminUsersController::delete/$1'); // Delete a user
    });
});
