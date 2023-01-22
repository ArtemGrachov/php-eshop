<?php
require_once(__DIR__ . '/../../../models/address.php');
require_once(__DIR__ . '/../../../traits/page-admin-auth.php');

class ControllerAdminAddressesList {
    use TraitPageAdminAuth;

    public function index() {
        $title = 'Addresses';
        $addresses = ModelAddress::getAddresses();

        include(__DIR__ . '/../../../views/admin/addresses/list.php');
    }

    public function remove () {
        $addressId = $_POST['id'];
        $address = ModelAddress::getAddress($addressId);
        $address->remove();
        header('Location: /admin/addresses');
    }
}
