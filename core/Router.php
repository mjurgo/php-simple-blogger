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
                $params = $this->castParams($params);
                $controllerParts = explode('@', $controller);
                return $this->callController(
                    $controllerParts[0],
                    $controllerParts[1],
                    $params
                );
            }
        }

        throw new Exception('No route for this url.');
    }

    private function callController($controller, $action, $params=[])
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

    private function castParams(array $params): array
    {
        $castedParams = [];

        foreach ($params as $param)
        {
            if (is_numeric($param))
            {
                $castedParams[] = (int)$param;
            }
            else
            {
                $castedParams[] = $param;
            }
        }

        return $castedParams;
    }
}
