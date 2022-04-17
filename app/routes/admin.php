<?php
require_once(__DIR__.'/../controllers/admin/dashboard.php');

$routes_admin = [
    '/' => [
        'GET' => 'ControllerAdminDashboard/index'
    ]
];
