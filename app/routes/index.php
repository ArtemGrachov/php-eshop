<?php
require_once('home.php');
require_once('admin.php');
require_once(__DIR__.'/../controllers/error.php');

$app_routes = [
    '/' => $routes_home,
    'admin' => $routes_admin
];
