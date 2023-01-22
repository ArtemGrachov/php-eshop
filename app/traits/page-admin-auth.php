<?php
require_once(__DIR__ . '/../services/auth.php');

trait TraitPageAdminAuth {
    public function routerValidation() {
        $auth = new ServiceAuth();

        if ($auth->isAuthenticated()) {
            return true;
        }

        header('Location: /admin/auth');
        return false;
    }
}