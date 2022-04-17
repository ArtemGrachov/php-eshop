<?php
require_once(__DIR__ . '/../../../models/product.php');
require_once(__DIR__ . '/../../../models/taxon.php');

class ControllerAdminProductsForm {
    public function index() {
        $title = 'Create product';
        $formAction = '/admin/products/create';
        $taxons = ModelTaxon::getTaxons();

        include(__DIR__ . '/../../../views/admin/products/form.php');
    }


    public function create() {
        $payload = [
            'name' => $_POST['name'],
            'price' => $_POST['price'],
            'description' => $_POST['description'],
            'stock' => $_POST['stock'],
            'tracking' => $_POST['tracking'],
            'taxonId' => $_POST['taxonId']
        ];

        $product = new ModelProduct($payload);
        $product->save();

        header('Location: /admin/products');
    }
}
