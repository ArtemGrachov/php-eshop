<?php

class ServiceCurrency {
    private static $instance = null;

    public static function getInstance() {
        if (null === static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    private function __construct() {}

    public function formatPrice($price) {
        return number_format($price, 2, '.', '&nbsp;') . '&nbsp;UAH';
    }
}
