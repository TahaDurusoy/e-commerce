<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Ana Sayfa ve Genel Sayfalar
$routes->get('/', 'HomeController::index');
$routes->get('about', 'HomeController::about');
$routes->get('products', 'ProductController::index');
$routes->get('login', 'AuthController::login');
$routes->get('register', 'AuthController::register');


// Yönetici Paneli Ürün Yönetimi Rotaları
$routes->get('admin/products', 'ProductController::index');
$routes->match(['get', 'post'], 'admin/products/add', 'ProductController::add');
$routes->match(['get', 'post'], 'admin/products/edit/(:segment)', 'ProductController::edit/$1');
$routes->get('admin/products/delete/(:segment)', 'ProductController::delete/$1');
