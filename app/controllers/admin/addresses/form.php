<?php
require_once(__DIR__ . '/../../../models/address.php');
require_once(__DIR__ . '/../../../traits/page-admin-auth.php');

class ControllerAdminAddressesForm {
    use TraitPageAdminAuth;

    private function viewInit($data) {
        $title = $data['title'] ?? null;
        $formAction = $data['formAction'] ?? null;
        $formErrors = $data['formErrors'] ?? null;
        $formValue = $data['formValue'] ?? null;
        $address = $data['address'] ?? null;

        include(__DIR__ . '/../../../views/admin/addresses/form.php');
    }

    private function validateForm($formValue) {
        $formErrors = [];

        $country = $_POST['country'] ?? null;
        $region = $_POST['region'] ?? null;
        $city = $_POST['city'] ?? null;
        $street = $_POST['street'] ?? null;
        $houseNumber = $_POST['houseNumber'] ?? null;
        $appartmentNumber = $_POST['appartmentNumber'] ?? null;
        $notes = $_POST['notes'] ?? null;

        if (!$country) {
            $formErrors['country'] = ['required' => true];
        }

        if (!$region) {
            $formErrors['region'] = ['required' => true];
        }

        if (!$city) {
            $formErrors['city'] = ['required' => true];
        }

        if (!$street) {
            $formErrors['street'] = ['required' => true];
        }

        if (!$houseNumber) {
            $formErrors['houseNumber'] = ['required' => true];
        }

        if (!$appartmentNumber) {
            $formErrors['appartmentNumber'] = ['required' => true];
        }

        if (!$notes) {
            $formErrors['notes'] = ['required' => true];
        }

        return $formErrors;
    }

    public function index() {
        $this->viewInit([
            'title' => 'Create address',
            'formAction' => '/admin/addresses/create',
            'formErrors' => [],
            'formValue' => [
                'country' => '',
                'region' => '',
                'city' => '',
                'street' => '',
                'houseNumber' => '',
                'appartmentNumber' => '',
                'notes' => ''
            ]
        ]);
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

        $formErrors = $this->validateForm($_POST);

        if (count($formErrors)) {
            $this->viewInit([
                'title' => 'Create address',
                'formAction' => '/admin/addresses/create',
                'formErrors' => $formErrors,
                'formValue' => $_POST
            ]);
            return;
        }

        $address = new ModelAddress($payload);
        $address->save();

        header('Location: /admin/addresses');
    }

    public function edit() {
        $addressId = $_GET['id'];

        $address = ModelAddress::getAddress($addressId);

        $this->viewInit([
            'title' => "Edit address $addressId",
            'formAction' => "/admin/addresses/edit?id=$addressId",
            'address' => $address,
            'formErrors' => [],
            'formValue' => [
                'country' => $address->country,
                'region' => $address->region,
                'city' => $address->city,
                'street' => $address->street,
                'houseNumber' => $address->houseNumber,
                'appartmentNumber' => $address->appartmentNumber,
                'notes' => $address->notes
            ]
        ]);
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

        $formErrors = $this->validateForm($_POST);

        if (count($formErrors)) {
            $this->viewInit([
                'title' => "Edit address $addressId",
                'formAction' => "/admin/addresses/edit?id=$addressId",
                'address' => $address,
                'formErrors' => $formErrors,
                'formValue' => $_POST
            ]);
            return;
        }

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
