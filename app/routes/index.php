<?php
require_once('customer.php');
require_once('admin.php');
require_once(__DIR__.'/../controllers/error.php');
require_once(__DIR__.'/../controllers/customer/product.php');

$app_routes = array_merge(
    $routes_customer,
    [
        'admin' => $routes_admin
    ]
);
