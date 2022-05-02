<?php
require_once(__DIR__ . '/../../models/product.php');

class ControllerTaxon {
    public function viewTaxonProducts() {
        $taxonId = $_GET['id'];
        $products = ModelProduct::getProductsByTaxon($taxonId, 12);

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
