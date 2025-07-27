<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Home;
use App\Controllers\ViewController;

/**
 * @var RouteCollection $routes
 */
$routes->get('/view/(:segment)', [ViewController::class, 'viewPost']);
$routes->get('/', [Home::class, 'index']);
