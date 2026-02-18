<?php
namespace App\Core;

class Router
{
    private array $routes = [
        'GET' => [],
        'POST' => []
    ];

    public function get(string $path, string $action): void
    {
        $this->routes['GET'][$path] = $action;
    }

    public function post(string $path, string $action): void
    {
        $this->routes['POST'][$path] = $action;
    }

    public function dispatch(string $uri, string $method): void
    {
        $path = parse_url($uri, PHP_URL_PATH) ?? '/';

        // détecte automatiquement le sous-dossier (ex: /MVP/Public)
        $basePath = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');

        if ($basePath && str_starts_with($path, $basePath)) {
            $path = substr($path, strlen($basePath));
        }

        $path = rtrim($path, '/') ?: '/';

        if (!isset($this->routes[$method][$path])) {
            http_response_code(404);
            echo "404 - Page non trouvée";
            return;
        }

        [$class, $methodName] = explode('@', $this->routes[$method][$path]);

        $controller = new $class();
        $controller->$methodName();
    }
}
