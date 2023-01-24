<?php
require_once(__DIR__ . '/../../../models/product.php');
require_once(__DIR__ . '/../../../traits/page-admin-auth.php');
require_once(__DIR__ . '/../../../constants/pagination.php');

class ControllerAdminProductsList {
    use TraitPageAdminAuth;

    public function index() {
        global $PAGINATION_LIMIT;

        $title = 'Products';
        $currentPage = $_GET['page'] ?? 1;
        $totalPages = 99; // @todo

        $products = ModelProduct::getProducts(
            $PAGINATION_LIMIT,
            ($currentPage - 1) * $PAGINATION_LIMIT
        );

        include(__DIR__ . '/../../../views/admin/products/list.php');
    }

    public function remove () {
        $productId = $_POST['id'];
        $taxon = ModelProduct::getProduct($productId);
        $taxon->remove();
        header('Location: /admin/products');
    }
}
