<?php

declare(strict_types=1);

class Router
{
    public array $routes = [
        'GET' => [],
        'POST' => []
    ];

    public function get(string $uri, string $controller): void
    {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post (string $uri, string $controller): void
    {
        $this->routes['POST'][$uri] = $controller;
    }

    public static function init(string $routesFile): Router
    {
        $router = new static;
        require($routesFile);

        return $router;
    }

    public function proceed($uri, $requestType)
    {
        foreach ($this->routes[$requestType] as $route => $controller)
        {
            $routeMatch = preg_replace(
                ['/\{[a-zA-Z]+\}/', '/\//'],
                ['([0-9]+)', '\/'],
                $route
            );
            
            if (preg_match("/^$routeMatch$/", $uri, $matches))
            {
                $params = [];
                if (count($matches) > 1)
                {
                    $params = array_slice($matches, 1, count($matches)-1);
                }
                $controllerParts = explode('@', $controller);
                return $this->callController(
                    $controllerParts[0],
                    $controllerParts[1],
                    $params
                );
            }
        }
    }

    public function callController($controller, $action, $params=[])
    {
        $controller = "App\\Controllers\\{$controller}";
        $controller = new $controller;

        if (!method_exists($controller, $action))
        {
            throw new Exception("There is no {$action} action.");
        }

        if ($params)
        {
            return $controller->$action(...$params);
        }
        else
        {
            return $controller->$action();
        }
    }
}
