<?php
require_once(__DIR__ . '/../services/auth.php');

trait TraitPageAdminGuest {
    public function routerValidation() {
        $auth = ServiceAuth::getInstance();

        if (!$auth->isAuthenticated()) {
            return true;
        }

        header('Location: /admin');
        return false;
    }
}