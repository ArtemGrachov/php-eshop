<?php
require_once(__DIR__.'/../controllers/customer/home.php');
require_once(__DIR__.'/../controllers/customer/product.php');
require_once(__DIR__.'/../controllers/customer/order.php');
require_once(__DIR__.'/../controllers/customer/cart.php');

$routes_customer = [
    '/' => [
        'GET' => 'ControllerHome/view'
    ],
    'product' => [
        'GET' => 'ControllerProduct/view'
    ],
    'order' => [
        'add' => [
            'POST' => 'ControllerOrder/addOrCreate'
        ]
    ],
    'cart' => [
        'GET' => 'ControllerCart/view'
    ]
];
