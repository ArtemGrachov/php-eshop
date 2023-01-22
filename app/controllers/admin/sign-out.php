<?php
require_once(__DIR__ . '/../../services/auth.php');
require_once(__DIR__ . '/../../models/user.php');
require_once(__DIR__ . '/../../traits/page-admin-auth.php');

class ControllerAdminSignOut {
    use TraitPageAdminAuth;

    public function signOut() {
        session_start();
        $_SESSION = array();
        session_destroy();

        header('Location: /admin/auth');
    }
}