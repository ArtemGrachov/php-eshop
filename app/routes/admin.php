<?php
require_once(__DIR__.'/../controllers/admin/dashboard.php');
require_once(__DIR__.'/../controllers/admin/taxons/form.php');
require_once(__DIR__.'/../controllers/admin/taxons/list.php');

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
            ]
        ],
        '/' => [
            'GET' => 'ControllerAdminDashboard/index'
        ]
    ]
];
