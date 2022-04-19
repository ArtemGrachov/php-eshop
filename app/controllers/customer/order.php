<?php
require_once(__DIR__ . '/../../models/product.php');

class ControllerOrder {
    public function addOrCreate() {
        global $ORDER_TOKEN;

        setcookie(
            $ORDER_TOKEN,
            bin2hex(openssl_random_pseudo_bytes(10)),
            0,
            '/'
        );

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function addToOrder() {

    }

    public function createOrder() {

    }
}
