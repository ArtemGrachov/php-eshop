<?php
require_once(__DIR__ . '/../../models/product.php');
require_once(__DIR__ . '/../../models/taxon.php');
require_once(__DIR__ . '/../../constants/pagination.php');

class ControllerHome {
    public function view() {
        global $PAGINATION_LIMIT;

        $products = ModelProduct::getProducts($PAGINATION_LIMIT);
        $taxons = ModelTaxon::getTaxons();

        include(__DIR__ . '/../../views/customer/home.php');
    }
}
