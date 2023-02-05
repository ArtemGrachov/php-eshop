<?php
require_once(__DIR__ . '/../../models/product.php');
require_once(__DIR__ . '/../../constants/pagination.php');

class ControllerTaxon {
    public function viewTaxonProducts() {
        global $PAGINATION_LIMIT;

        $taxonId = $_GET['id'];
        $currentPage = $_GET['page'] ?? 1;

        $products = ModelProduct::getProducts(
            [ 'taxonId' => $taxonId ],
            $PAGINATION_LIMIT,
            ($currentPage - 1) * $PAGINATION_LIMIT
        );

        $productsCount = ModelProduct::countProducts(
            [ 'taxonId' => $taxonId ]
        );

        $taxon = ModelTaxon::getTaxon($taxonId);

        $breadcrumbs = [
            [
                'link' => '/',
                'label' => ServiceI18n::t('customer.home')
            ],
            [
                'link' => "/taxon?id=$taxonId",
                'label' => $taxon->name
            ]
        ];

        $heading = $taxon->name;
        $title = ServiceI18n::t('customer.title_page', [ 'page' => $taxon->name ]);
        $description = $taxon->description;

        include(__DIR__ . '/../../views/customer/products.php');
    }
}
