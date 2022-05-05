<?php
require_once(__DIR__ . '/../../models/product.php');

class ControllerSearch {
    public function viewSearchProducts() {
        $query = $_GET['query'];

        $products = ModelProduct::getProductsBySearchQuery($query, 12);

        $breadcrumbs = [
            [
                'link' => '/',
                'label' => 'Home'
            ],
            [
                'label' => "Search results: $query"
            ]
        ];

        $title = "Search results: $query";

        include(__DIR__ . '/../../views/customer/products.php');
    }
}
