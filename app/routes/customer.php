<?php
require_once(__DIR__.'/../controllers/customer/home.php');

$routes_customer = [
    '/' => [
        'GET' => 'ControllerHome/view'
    ],
    '/product' => [
        'GET' => 'ControllerProduct/view'
    ]
];
