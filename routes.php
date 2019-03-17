<?php

use Symfony\Component\Routing;

$routes = new Routing\RouteCollection();
$routes->add('view', new Routing\Route('/list'));
$routes->add('edit', new Routing\Route('/edit/{id}'));
$routes->add('create', new Routing\Route('/'));
$routes->add('validate', new Routing\Route('/validate'));

return $routes;
