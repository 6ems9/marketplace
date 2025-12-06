<?php

namespace App\Routing;

use App\Support\View;

class Router
{
    /** @var array<string, array<int, array{pattern:string,action:callable}>> */
    private $routes = [
        'GET' => [],
        'POST' => [],
    ];

    public function get(string $uri, callable $action): void
    {
        $this->addRoute('GET', $uri, $action);
    }

    public function post(string $uri, callable $action): void
    {
        $this->addRoute('POST', $uri, $action);
    }

    private function addRoute(string $method, string $uri, callable $action): void
    {
        $normalized = $uri === '/' ? '/' : rtrim($uri, '/');
        $pattern = '#^' . preg_replace('#\{([^}/]+)\}#', '(?P<$1>[^/]+)', $normalized) . '$#';
        $pattern = '#^' . preg_replace('#\{([^}/]+)\}#', '(?P<$1>[^/]+)', rtrim($uri, '/')) . '$#';
        $this->routes[$method][] = ['pattern' => $pattern, 'action' => $action];
    }

    public function dispatch(string $method, string $uri): void
    {
        $path = parse_url($uri, PHP_URL_PATH) ?: '/';
        $path = rtrim($path, '/') ?: '/';

        foreach ($this->routes[$method] ?? [] as $route) {
            if (preg_match($route['pattern'], $path, $matches)) {
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
                echo call_user_func($route['action'], $params);
                return;
            }
        }

        http_response_code(404);
        echo View::render('errors/404', ['path' => $path]);
    }
}
