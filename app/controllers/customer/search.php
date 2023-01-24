<?php
require_once(__DIR__ . '/../../models/product.php');
require_once(__DIR__ . '/../../constants/pagination.php');

class ControllerSearch {
    public function viewSearchProducts() {
        global $PAGINATION_LIMIT;

        $query = $_GET['query'] ?? '';
        $currentPage = $_GET['page'] ?? 1;
        $totalPages = 99; // @todo

        $products = ModelProduct::getProductsBySearchQuery(
            $query,
            $PAGINATION_LIMIT,
            ($currentPage - 1) * $PAGINATION_LIMIT
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
