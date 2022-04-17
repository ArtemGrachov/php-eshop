<?php

class Router {
    protected $routes;

    public function __construct($routes)
    {
        $this->routes = $routes;
    }

    public function requestHandler ($method, $path) {
        $pathConfig = $this->routes['/']['/']['GET'];
        $pathConfigNames = explode('/', $pathConfig);

        $controllerClassName = $pathConfigNames[0];
        $methodName = $pathConfigNames[1];

        $controller = new $controllerClassName;
        $controller->$methodName();
    }
}
