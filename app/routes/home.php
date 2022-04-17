<?php
require_once(__DIR__.'/../controllers/home.php');

$routes_home = [
    '/' => [
        'GET' => 'ControllerHome/view'
    ]
];
