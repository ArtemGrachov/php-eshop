<?php
require_once(__DIR__ . '/../../../models/product.php');
require_once(__DIR__ . '/../../../models/taxon.php');
require_once(__DIR__ . '/../../../utils/files.php');

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

        if (isset($_FILES['image'])){
            $image = $_FILES['image'];
            $imageTmpName = $_FILES['image']['tmp_name'];

            $imageName = bin2hex(openssl_random_pseudo_bytes(10));

            move_uploaded_file($imageTmpName, filePathProductImage($imageName));

            $payload['image'] = $imageName;
        }

        $product = new ModelProduct($payload);

        $product->save();

        header('Location: /admin/products');
    }

    public function edit() {
        $title = 'Edit product';
        $productId = $_GET['id'];
        $formAction = "/admin/products/edit?id=$productId";

        $product = ModelProduct::getProduct($productId);
        $taxons = ModelTaxon::getTaxons();

        include(__DIR__ . '/../../../views/admin/products/form.php');
    }

    public function save() {
        $productId = $_GET['id'];

        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $stock = $_POST['stock'];
        $tracking = $_POST['tracking'];
        $taxonId = $_POST['taxonId'];

        $product = ModelProduct::getProduct($productId);

        $product->name = $name;
        $product->price = $price;
        $product->description = $description;
        $product->stock = $stock;
        $product->tracking = $tracking;
        $product->taxonId = $taxonId;

        if (isset($_FILES['image'])){
            $image = $_FILES['image'];
            $imageTmpName = $_FILES['image']['tmp_name'];

            $imageName = bin2hex(openssl_random_pseudo_bytes(10));

            if (!is_null($product->image)) {
                unlink(filePathProductImage($product->image));
            }

            move_uploaded_file($imageTmpName, filePathProductImage($imageName));

            $product->image = $imageName;
        }

        $product->save();

        header('Location: /admin/products');
    }
}
