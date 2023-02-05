<?php
require_once(__DIR__ . '/../../models/product.php');

class ControllerProduct {
    public function view() {
        $productId = $_GET['id'];
        $product = ModelProduct::getProduct($productId);

        if (is_null($product)) {
            throw new ExtendedException(
                'Not found',
                ['code' => 404]
            );
        }

        $taxonId = $product->taxonId;
        $taxon = ModelTaxon::getTaxon($taxonId);

        $title = ServiceI18n::t('customer.title_page', [ 'page' => $product->name ]);
        $heading = ServiceI18n::t('customer.title_page', [ 'page' => $product->name ]);

        $breadcrumbs = [
            [
                'link' => '/',
                'label' => ServiceI18n::t('customer.home')
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
