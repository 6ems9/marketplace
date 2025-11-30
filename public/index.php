<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

$router = require __DIR__ . '/../routes.php';

$router->dispatch($_SERVER['REQUEST_METHOD'] ?? 'GET', $_SERVER['REQUEST_URI'] ?? '/');
