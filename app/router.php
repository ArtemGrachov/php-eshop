<?php

class Router {
    protected $routes;

    public function __construct($routes)
    {
        $this->routes = $routes;
    }

    public function requestHandler ($method, $path) {
        $segments = explode('/', $path);
        $segmentsFiltered = array_filter($segments, function($segment) {
            return strlen($segment) > 0;
        });
        $pathFormatted = implode('/', $segmentsFiltered);

        if (strlen($pathFormatted) === 0) {
            $pathFormatted = '/';
        }

        $pathRoot = $this->getRouteConfig($this->routes, $pathFormatted);

        $pathConfig = empty($pathRoot[$method]) ? null : $pathRoot[$method];

        try {
            if (is_null($pathConfig)) {
                throw new ExtendedException(
                    'Not found',
                    ['code' => 404]
                );
            } else {
                $pathConfigNames = explode('/', $pathConfig);
                $controllerClassName = $pathConfigNames[0];
                $methodName = $pathConfigNames[1];
            }

            $controller = new $controllerClassName;

            if (method_exists($controller, 'routerValidation')) {
                $result = $controller->routerValidation();

                if (!$result) {
                    return;
                }
            }

            $controller->$methodName();
        } catch (Exception $e) {
            $controller = new ControllerError($e);
            $controller->view();
        }
    }


    private function getRouteConfig ($routeConfig, $path, $prefix = '') {
        $result = null;

        foreach ($routeConfig as $routeKey => $routeValue) {
            if ($routeKey === '/') {
                $combinedKey = $prefix;
            } else {
                if (strlen($prefix) > 0) {
                    $combinedKey = $prefix . '/' . $routeKey;
                } else {
                    $combinedKey = $routeKey;
                }
            }

            if (strlen($combinedKey) === 0) {
                $combinedKey = '/';
            }

            if ($combinedKey === $path) {
                if (!empty($routeValue['/'])) {
                    $result = $this->getRouteConfig($routeValue, $path, $combinedKey);
                } else {
                    $result = $routeValue;
                }
            } else if (gettype($routeValue) !== 'string') {
                $result = $this->getRouteConfig($routeValue, $path, $combinedKey);
            }

            if (!is_null($result)) {
                break;
            }
        }

        return $result;
    }
}
