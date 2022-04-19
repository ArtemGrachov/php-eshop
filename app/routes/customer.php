<?php
require_once(__DIR__.'/../controllers/customer/home.php');
require_once(__DIR__.'/../controllers/customer/product.php');

$routes_customer = [
    '/' => [
        'GET' => 'ControllerHome/view'
    ],
    'product' => [
        'GET' => 'ControllerProduct/view'
    ]
];
