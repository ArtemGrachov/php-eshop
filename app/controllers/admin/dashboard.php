<?php

class ControllerAdminDashboard {
    public function index() {
        $title = 'Dashboard';
        include(__DIR__ . '/../../views/admin/dashboard.php');
    }
}