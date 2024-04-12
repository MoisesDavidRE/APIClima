<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/clima','Clima::index');
$routes->get('/ubicaciones','Clima::getUbicaciones');
$routes->get('/climaByCP','Clima::getClimaByCP');
$routes->get('/climaByFechas','Clima::getClimaByFechas');

