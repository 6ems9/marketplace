<?php

use App\Controllers\ProductController;
use App\Routing\Router;

$router = new Router();

$controller = new ProductController();

$router->get('/', [$controller, 'index']);
$router->get('/product/{id}', [$controller, 'show']);
$router->get('/product/create', [$controller, 'create']);
$router->post('/product', [$controller, 'store']);

return $router;
