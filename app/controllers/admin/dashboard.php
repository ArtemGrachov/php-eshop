<?php
require_once(__DIR__ . '/../../traits/page-admin-auth.php');

class ControllerAdminDashboard {
    use TraitPageAdminAuth;

    public function index() {
        $title = 'Dashboard';
        include(__DIR__ . '/../../views/admin/dashboard.php');
    }
}
