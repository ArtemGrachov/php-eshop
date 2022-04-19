<?php
require_once(__DIR__ . '/../../models/product.php');
require_once(__DIR__ . '/../../models/taxon.php');

class ControllerHome {
    public function view() {
        $products = ModelProduct::getProducts();
        $taxons = ModelTaxon::getTaxons();

        include(__DIR__ . '/../../views/customer/home.php');
    }
}
