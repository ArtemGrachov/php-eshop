<?php
require_once(__DIR__ . '/../../../models/address.php');

class ControllerAdminAddressesList {
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
