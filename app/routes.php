<?php

use Basalt\Http\Request;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();

$indexRoute = new Route(
    '/', [
        '_controller' => 'Basalt\\Http\\Controllers\\PageController@page'
    ], [], [], '', [], Request::METHOD_GET);
$pageRoute = new Route(
    '/{slug}', [
        '_controller' => 'Basalt\\Http\\Controllers\\PageController@page'
    ], [], [], '', [], Request::METHOD_GET);

$pagesAdminRoute = new Route(
    '/admin/pages', [
        '_controller' => 'Basalt\\Http\\Controllers\\PageController@adminIndex'
    ], [], [], '', [], Request::METHOD_GET);

$routes->add('index', $indexRoute);
$routes->add('pagesAdmin', $pagesAdminRoute);

$routes->add('page', $pageRoute);

return $routes;