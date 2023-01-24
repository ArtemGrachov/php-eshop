<?php
require_once(__DIR__ . '/../../models/product.php');
require_once(__DIR__ . '/../../constants/pagination.php');

class ControllerSearch {
    public function viewSearchProducts() {
        global $PAGINATION_LIMIT;

        $query = $_GET['query'] ?? '';
        $page = $_GET['page'] ?? 1;

        $products = ModelProduct::getProductsBySearchQuery(
            $query,
            $PAGINATION_LIMIT,
            ($page - 1) * $PAGINATION_LIMIT
        );

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
        $serchFormQuery = $query;

        include(__DIR__ . '/../../views/customer/products.php');
    }
}
