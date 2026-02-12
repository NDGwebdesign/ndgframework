<?php

class Router
{
    protected array $routes = [];

    public function add($method, $uri, $action)
    {
        $route = new RouteDefinition($method, $uri, $action, $this);
        $this->routes[$method][$uri] = $route;

        return $route;
    }

    public function dispatch($uri, $method)
    {
        $route = $this->routes[$method][$uri] ?? null;

        if (!$route) {
            http_response_code(404);
            echo "404 page";
            return;
        }

        $action = $route->action;

        // Closure route
        if ($action instanceof Closure) {
            echo $action();
            return;
        }

        // Controller route
        [$controller, $method] = $action;

        $controller = new $controller;
        echo $controller->$method();
    }
}
