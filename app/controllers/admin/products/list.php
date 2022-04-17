<?php
require_once(__DIR__ . '/../../../models/product.php');

class ControllerAdminProductsList {
    public function index() {
        $title = 'Products';
        $products = ModelProduct::getProducts();

        include(__DIR__ . '/../../../views/admin/products/list.php');
    }
}
