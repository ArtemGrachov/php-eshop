<?php
require_once(__DIR__ . '/../../models/product.php');

class ControllerProduct {
    public function view() {
        $productId = $_GET['id'];
        $product = ModelProduct::getProduct($productId);

        include(__DIR__ . '/../../views/customer/product.php');
    }
}
