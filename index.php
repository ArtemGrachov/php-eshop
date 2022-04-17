<?php
require_once('app/router.php');
require_once('app/routes/index.php');

$router = new Router($app_routes);

$method = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['REQUEST_URI'];

$router->requestHandler($method, $path);
