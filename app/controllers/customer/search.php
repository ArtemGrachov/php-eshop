<?php
require_once(__DIR__ . '/../../models/product.php');
require_once(__DIR__ . '/../../constants/pagination.php');

class ControllerSearch {
    public function viewSearchProducts() {
        global $PAGINATION_LIMIT;

        $query = $_GET['query'] ?? '';
        $currentPage = $_GET['page'] ?? 1;

        $products = ModelProduct::getProducts(
            [ 'query' => $query ],
            $PAGINATION_LIMIT,
            ($currentPage - 1) * $PAGINATION_LIMIT
        );

        $productsCount = ModelProduct::countProducts(
            [ 'query' => $query ]
        );

        $breadcrumbs = [
            [
                'link' => '/',
                'label' => ServiceI18n::t('customer.home')
            ],
            [
                'label' => "Search results: $query"
            ]
        ];

        $heading = ServiceI18n::t('customer.view_search.title', [ 'query' => $query ]);

        $title = ServiceI18n::t('customer.title_page', [ 'page' => $query ]);

        $serchFormQuery = $query;

        include(__DIR__ . '/../../views/customer/products.php');
    }
}
