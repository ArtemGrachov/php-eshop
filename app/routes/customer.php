<?php
require_once(__DIR__.'/../controllers/customer/home.php');
require_once(__DIR__.'/../controllers/customer/product.php');
require_once(__DIR__.'/../controllers/customer/order.php');
require_once(__DIR__.'/../controllers/customer/cart.php');
require_once(__DIR__.'/../controllers/customer/checkout.php');
require_once(__DIR__.'/../controllers/customer/taxon.php');

$routes_customer = [
    '/' => [
        'GET' => 'ControllerHome/view'
    ],
    'product' => [
        'GET' => 'ControllerProduct/view'
    ],
    'taxon' => [
        'GET' => 'ControllerTaxon/viewTaxonProducts'
    ],
    'order' => [
        'add' => [
            'POST' => 'ControllerOrder/addOrCreate'
        ],
        'update' => [
            'POST' => 'ControllerOrder/update'
        ]
    ],
    'cart' => [
        'GET' => 'ControllerCart/view'
    ],
    'checkout' => [
        'GET' => 'ControllerCheckout/view',
        'POST' => 'ControllerCheckout/submit'
    ]
];
