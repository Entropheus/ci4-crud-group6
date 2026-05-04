<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/customers', 'Customer::index');
$routes->resource('api/customers', ['controller' => 'Api\CustomerApi']);
