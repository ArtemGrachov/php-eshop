<?php

class Router {
    protected $routes;

    public function __construct($routes)
    {
        $this->routes = $routes;
    }

    public function requestHandler ($method, $path) {
        $pathArr = explode('/', $path);

        $pathRoot = array_reduce(
            $pathArr,
            function($acc, $curr) {
                if (is_null($acc)) {
                    return null;
                }

                $segment = $curr === '' ? '/' : $curr;

                if (empty($acc[$segment])) {
                    return null;
                }

                return $acc[$segment];
            }, $this->routes
        );

        $pathConfig = null;

        $pathConfig = empty($pathRoot[$method]) ? null : $pathRoot[$method];

        if (is_null($pathConfig)) {
            $controllerClassName = 'ControllerError';
            $methodName = 'view';
        } else {
            $pathConfigNames = explode('/', $pathConfig);
            $controllerClassName = $pathConfigNames[0];
            $methodName = $pathConfigNames[1];
        }

        $controller = new $controllerClassName;
        $controller->$methodName();
    }
}
