<?php
require_once(__DIR__ . '/../../../models/address.php');
require_once(__DIR__ . '/../../../traits/page-admin-auth.php');

class ControllerAdminAddressesForm {
    use TraitPageAdminAuth;

    public function index() {
        $title = 'Create address';
        $formAction = '/admin/addresses/create';

        include(__DIR__ . '/../../../views/admin/addresses/form.php');
    }

    public function create() {
        $payload = [
            'country' => $_POST['country'],
            'region' => $_POST['region'],
            'city' => $_POST['city'],
            'street' => $_POST['street'],
            'houseNumber' => $_POST['houseNumber'],
            'appartmentNumber' => $_POST['appartmentNumber'],
            'notes' => $_POST['notes']
        ];

        $address = new ModelAddress($payload);
        $address->save();

        header('Location: /admin/addresses');
    }

    public function edit() {
        $addressId = $_GET['id'];
        $title = "Edit address $addressId";
        $formAction = "/admin/addresses/edit?id=$addressId";

        $address = ModelAddress::getAddress($addressId);

        include(__DIR__ . '/../../../views/admin/addresses/form.php');
    }

    public function save() {
        $addressId = $_GET['id'];

        $country = $_POST['country'];
        $region = $_POST['region'];
        $city = $_POST['city'];
        $street = $_POST['street'];
        $houseNumber = $_POST['houseNumber'];
        $appartmentNumber = $_POST['appartmentNumber'];
        $notes = $_POST['notes'];

        $address = ModelAddress::getAddress($addressId);

        $address->country = $country;
        $address->region = $region;
        $address->city = $city;
        $address->street = $street;
        $address->houseNumber = $houseNumber;
        $address->appartmentNumber = $appartmentNumber;
        $address->notes = $notes;

        $address->save();

        header('Location: /admin/addresses');
    }
}
