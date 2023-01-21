<?php
require_once('app/config/config.php');
require_once('app/constants/cookies.php');
require_once('app/constants/order.php');
require_once('app/models/database.php');
require_once('app/router.php');
require_once('app/routes/index.php');
require_once('app/services/auth.php');

$router = new Router($app_routes);

$auth = new ServiceAuth();

$method = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['REQUEST_URI'];

$router->requestHandler(
    $method,
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

$auth->init();
