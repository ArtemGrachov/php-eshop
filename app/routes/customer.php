<?php
require_once(__DIR__.'/../controllers/customer/home.php');
require_once(__DIR__.'/../controllers/customer/product.php');
require_once(__DIR__.'/../controllers/customer/order.php');
require_once(__DIR__.'/../controllers/customer/order-items.php');
require_once(__DIR__.'/../controllers/customer/cart.php');
require_once(__DIR__.'/../controllers/customer/checkout.php');
require_once(__DIR__.'/../controllers/customer/taxon.php');
require_once(__DIR__.'/../controllers/customer/search.php');

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
    'search' => [
        'product' => [
            'GET' => 'ControllerSearch/viewSearchProducts'
        ]
    ],
    'order' => [
        'add' => [
            'POST' => 'ControllerOrder/addOrCreate'
        ],
        'update' => [
            'POST' => 'ControllerOrder/update'
        ]
    ],
    'order-items' => [
        'remove' => [
            'GET' => 'ControllerOrderItems/remove'
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
