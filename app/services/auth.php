<?php

class ServiceAuth {
    private static $instance = null;

    public $db = null;

    public static function getInstance() {
        if (null === static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    public static function generatePassword($rawPassword) {
        return password_hash($rawPassword, PASSWORD_BCRYPT);
    }

    public function init() {
        session_start();
    }

    public function createSession($user) {
        $_SESSION['userId'] = $user->id;
    }

    public function clearSession() {
        $_SESSION['userId'] = null;
    }

    public function isAuthenticated() {
        if (isset($_SESSION['userId'])) {
            return true;
        }

        return false;
    }
}
