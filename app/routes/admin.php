<?php
require_once(__DIR__.'/../controllers/admin/dashboard.php');
require_once(__DIR__.'/../controllers/admin/auth.php');
require_once(__DIR__.'/../controllers/admin/taxons/form.php');
require_once(__DIR__.'/../controllers/admin/taxons/list.php');
require_once(__DIR__.'/../controllers/admin/products/form.php');
require_once(__DIR__.'/../controllers/admin/products/list.php');
require_once(__DIR__.'/../controllers/admin/orders/form.php');
require_once(__DIR__.'/../controllers/admin/orders/list.php');
require_once(__DIR__.'/../controllers/admin/addresses/form.php');
require_once(__DIR__.'/../controllers/admin/addresses/list.php');
require_once(__DIR__.'/../controllers/admin/users/form.php');
require_once(__DIR__.'/../controllers/admin/users/list.php');

$routes_admin = [
    '/' => [
        'taxons' => [
            '/' => [
                'GET' => 'ControllerAdminTaxonsList/index',
            ],
            'create' => [
                'GET' => 'ControllerAdminTaxonsForm/index',
                'POST' => 'ControllerAdminTaxonsForm/create'
            ],
            'edit' => [
                'GET' => 'ControllerAdminTaxonsForm/edit',
                'POST' => 'ControllerAdminTaxonsForm/save'
            ],
            'delete' => [
                'POST' => 'ControllerAdminTaxonsList/remove'
            ]
        ],
        'products' => [
            '/' => [
                'GET' => 'ControllerAdminProductsList/index'
            ],
            'create' => [
                'GET' => 'ControllerAdminProductsForm/index',
                'POST' => 'ControllerAdminProductsForm/create'
            ],
            'edit' => [
                'GET' => 'ControllerAdminProductsForm/edit',
                'POST' => 'ControllerAdminProductsForm/save'
            ],
            'delete' => [
                'POST' => 'ControllerAdminProductsList/remove'
            ]
        ],
        'orders' => [
            '/' => [
                'GET' => 'ControllerAdminOrdersList/index'
            ],
            'create' => [
                'GET' => 'ControllerAdminOrdersForm/index',
                'POST' => 'ControllerAdminOrdersForm/create'
            ],
            'edit' => [
                'GET' => 'ControllerAdminOrdersForm/edit',
                'POST' => 'ControllerAdminOrdersForm/save'
            ],
            'delete' => [
                'POST' => 'ControllerAdminOrdersList/remove'
            ]
        ],
        'addresses' => [
            '/' => [
                'GET' => 'ControllerAdminAddressesList/index'
            ],
            'create' => [
                'GET' => 'ControllerAdminAddressesForm/index',
                'POST' => 'ControllerAdminAddressesForm/create'
            ],
            'edit' => [
                'GET' => 'ControllerAdminAddressesForm/edit',
                'POST' => 'ControllerAdminAddressesForm/save'
            ],
            'delete' => [
                'POST' => 'ControllerAdminAddressesList/remove'
            ]
        ],
        'users' => [
            '/' => [
                'GET' => 'ControllerAdminUsersList/index'
            ],
            'create' => [
                'GET' => 'ControllerAdminUsersForm/index',
                'POST' => 'ControllerAdminUsersForm/create'
            ],
            'edit' => [
                'GET' => 'ControllerAdminUsersForm/edit',
                'POST' => 'ControllerAdminUsersForm/save'
            ],
            'delete' => [
                'POST' => 'ControllerAdminUsersList/remove'
            ]
        ],
        'auth' => [
            '/' => [
                'GET' => 'ControllerAdminAuth/index',
                'POST' => 'ControllerAdminAuth/signIn'
            ],
            'sign-out' => [
                'GET' => 'ControllerAdminAuth/signOut'
            ]
        ],
        '/' => [
            'GET' => 'ControllerAdminDashboard/index'
        ]
    ]
];
