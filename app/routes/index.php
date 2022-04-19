<?php
require_once('customer.php');
require_once('admin.php');
require_once(__DIR__.'/../controllers/error.php');

$app_routes = [
    '/' => $routes_customer,
    'admin' => $routes_admin
];
