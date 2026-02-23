<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// SaaS Dashboard Routes
$routes->get('admin', 'Admin::index');
$routes->get('superadmin', 'Superadmin::index');

// Theme Preview Routes
$routes->get('preview/silversheen', 'ThemePreview::silversheen');
$routes->get('preview/silversheen/story', 'ThemePreview::silversheen_story');
$routes->get('preview/silversheen/product', 'ThemePreview::silversheen_product');
