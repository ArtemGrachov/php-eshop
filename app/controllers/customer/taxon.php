<?php
require_once(__DIR__ . '/../../models/product.php');
require_once(__DIR__ . '/../../constants/pagination.php');

class ControllerTaxon {
    public function viewTaxonProducts() {
        global $PAGINATION_LIMIT;

        $taxonId = $_GET['id'];
        $currentPage = $_GET['page'] ?? 1;
        $totalPages = 99; // @todo

        $products = ModelProduct::getProductsByTaxon(
            $taxonId,
            $PAGINATION_LIMIT,
            ($currentPage - 1) * $PAGINATION_LIMIT
        );

        $taxon = ModelTaxon::getTaxon($taxonId);

        $breadcrumbs = [
            [
                'link' => '/',
                'label' => 'Home'
            ],
            [
                'link' => "/taxon?id=$taxonId",
                'label' => $taxon->name
            ]
        ];

        $title = $taxon->name;
        $description = $taxon->description;

        include(__DIR__ . '/../../views/customer/products.php');
    }
}
