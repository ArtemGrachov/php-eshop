<?php
require_once(__DIR__.'/../controllers/admin/dashboard.php');
require_once(__DIR__.'/../controllers/admin/taxons/form.php');

$routes_admin = [
    '/' => [
        'taxons' => [
            'create' => [
                'GET' => 'ControllerAdminTaxonsForm/index',
                'POST' => 'ControllerAdminTaxonsForm/create'
            ]
        ],
        '/' => [
            'GET' => 'ControllerAdminDashboard/index'
        ]
    ]
];
