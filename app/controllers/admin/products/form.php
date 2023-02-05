<?php
require_once(__DIR__ . '/../../../models/product.php');
require_once(__DIR__ . '/../../../models/taxon.php');
require_once(__DIR__ . '/../../../utils/files.php');
require_once(__DIR__ . '/../../../traits/page-admin-auth.php');

class ControllerAdminProductsForm {
    use TraitPageAdminAuth;

    private function validateForm($formValue) {
        $formErrors = [];

        $name = $_POST['name'] ?? null;
        $price = $_POST['price'] ?? null;
        $description = $_POST['description'] ?? null;
        $stock = $_POST['stock'] ?? null;
        $tracking = $_POST['tracking'] ?? false;
        $taxonId = $_POST['taxonId'] ?? null;

        if (!$name) {
            $formErrors['name'] = ['required' => true];
        }

        if (!$price) {
            $formErrors['price'] = ['required' => true];
        }

        if ($tracking && !$stock) {
            $formErrors['stock'] = ['required' => true];
        }

        if (!$taxonId) {
            $formErrors['taxonId'] = ['required' => true];
        }

        return $formErrors;
    }

    private function viewInit($data) {
        $title = $data['title'];
        $formAction = $data['formAction'];
        $formErrors = $data['formErrors'];
        $formValue = $data['formValue'];
        $taxons = ModelTaxon::getTaxons();

        include(__DIR__ . '/../../../views/admin/products/form.php');
    }

    public function index() {
        $this->viewInit([
            'title' => ServiceI18n::t('admin.view_products_form.create_product'),
            'formAction' => '/admin/products/create',
            'formErrors' => [],
            'formValue' => [
                'name' => '',
                'price' => '',
                'description' => '',
                'stock' => '',
                'tracking' => false,
                'taxonId' => ''
            ]
        ]);
    }


    public function create() {
        $payload = [
            'name' => $_POST['name'] ?? null,
            'price' => $_POST['price'] ?? null,
            'description' => $_POST['description'] ?? null,
            'stock' => $_POST['stock'] ?? null,
            'tracking' => $_POST['tracking'] ?? false,
            'taxonId' => $_POST['taxonId'] ?? null
        ];

        $formErrors = $this->validateForm($_POST);

        if (count($formErrors)) {
            $this->viewInit([
                'title' => ServiceI18n::t('admin.view_products_form.create_product'),
                'formAction' => '/admin/products/create',
                'formErrors' => $formErrors,
                'formValue' => $_POST
            ]);
            return;
        }

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
        $productId = $_GET['id'];
        $product = ModelProduct::getProduct($productId);

        $this->viewInit([
            'title' => ServiceI18n::t('admin.view_products_form.edit_product', [ 'productName' => $product->name ]),
            'formAction' => "/admin/products/edit?id=$productId",
            'formErrors' => [],
            'formValue' => [
                'name' => $product->name,
                'price' => $product->price,
                'description' => $product->description,
                'stock' => $product->stock,
                'tracking' => $product->tracking,
                'taxonId' => $product->taxonId,
            ]
        ]);
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

        $formErrors = $this->validateForm($_POST);

        if (count($formErrors)) {
            $this->viewInit([
                'title' => ServiceI18n::t('admin.view_products_form.edit_product', [ 'productName' => $product->name ]),
                'formAction' => "/admin/products/edit?id=$productId",
                'formErrors' => $formErrors,
                'formValue' => $_POST
            ]);
            return;
        }

        $product->name = $name;
        $product->price = $price;
        $product->description = $description;
        $product->stock = $stock;
        $product->tracking = $tracking;
        $product->taxonId = $taxonId;

        if ($_FILES['image']['size'] != 0) {
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
