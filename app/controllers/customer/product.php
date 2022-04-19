<?php
require_once(__DIR__ . '/../../models/product.php');

class ControllerProduct {
    public function view() {
        $productId = $_GET['id'];
        $product = ModelProduct::getProduct($productId);

        $taxonId = $product->taxonId;
        $taxon = ModelTaxon::getTaxon($taxonId);

        $breadcrumbs = [
            [
                'link' => '/',
                'label' => 'Home'
            ],
            [
                'link' => "/taxon?id=$taxonId",
                'label' => $taxon->name
            ],
            [
                'label' => $product->name
            ]
        ];

        include(__DIR__ . '/../../views/customer/product.php');
    }
}
