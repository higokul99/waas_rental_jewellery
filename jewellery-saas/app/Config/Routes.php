<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Super Admin Routes
$routes->get('superadmin', 'SuperadminAuth::login');
$routes->post('superadmin/attempt', 'SuperadminAuth::attemptLogin');
$routes->get('superadmin/logout', 'SuperadminAuth::logout');
$routes->group('superadmin/dashboard', ['filter' => 'auth'], static function ($routes) {
    $routes->get('/', 'SuperadminDashboard::index');
});

// Subscriber Admin Routes
$routes->get('admin', 'AdminAuth::login');
$routes->post('admin/attempt', 'AdminAuth::attemptLogin');
$routes->get('admin/logout', 'AdminAuth::logout');
$routes->group('admin/dashboard', ['filter' => 'auth'], static function ($routes) {
    $routes->get('/', 'AdminDashboard::index');
});

// Theme Preview Routes
$routes->get('preview/silversheen', 'ThemePreview::silversheen');
$routes->get('preview/silversheen/products', 'ThemePreview::products');
$routes->get('preview/silversheen/story', 'ThemePreview::silversheen_story');
$routes->get('preview/silversheen/product', 'ThemePreview::silversheen_product');

// Front‑end customer authentication
$routes->get('login', 'CustomerAuth::login');
$routes->post('customer/attempt', 'CustomerAuth::attemptLogin');
$routes->get('register', 'CustomerAuth::register');
