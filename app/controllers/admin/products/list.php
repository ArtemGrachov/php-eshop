<?php
require_once(__DIR__ . '/../../../models/product.php');
require_once(__DIR__ . '/../../../traits/page-admin-auth.php');

class ControllerAdminProductsList {
    use TraitPageAdminAuth;

    public function index() {
        $title = 'Products';
        $products = ModelProduct::getProducts();

        include(__DIR__ . '/../../../views/admin/products/list.php');
    }

    public function remove () {
        $productId = $_POST['id'];
        $taxon = ModelProduct::getProduct($productId);
        $taxon->remove();
        header('Location: /admin/products');
    }
}
