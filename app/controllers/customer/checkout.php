<?php
require_once(__DIR__ . '/../../models/product.php');
require_once(__DIR__ . '/../../models/taxon.php');
require_once(__DIR__ . '/../../models/customer.php');
require_once(__DIR__ . '/../../models/address.php');

class ControllerCheckout {
    private function getOrder() {
        global $ORDER_TOKEN;

        $orderToken = isset($_COOKIE[$ORDER_TOKEN]) ? $_COOKIE[$ORDER_TOKEN] : null;

        if (!$orderToken) {
            return null;
        }

        return ModelOrder::getOrderByToken($orderToken);
    }

    private function validateSubmitForm($formValue) {
        $formErrors = [];

        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $phoneNumber = $_POST['phoneNumber'];
        $isCompany = isset($_POST['isCompany']) ? ($_POST['isCompany'] === 'on' ? true : false) : false;
        $companyName = $_POST['companyName'];
        $companyVatNumber = $_POST['companyVatNumber'];
        $country = $_POST['country'];
        $city = $_POST['city'];
        $street = $_POST['street'];
        $houseNumber = $_POST['houseNumber'];

        if (!$firstName) {
            $formErrors['firstName'] = ['required' => true];
        }

        if (!$lastName) {
            $formErrors['lastName'] = ['required' => true];
        }

        if (!$email) {
            $formErrors['email'] = ['required' => true];
        }

        if (!$phoneNumber) {
            $formErrors['phoneNumber'] = ['required' => true];
        }


        if ($isCompany) {
            if (!$companyName) {
                $formErrors['companyName'] = ['required' => true];
            }
            if (!$companyVatNumber) {
                $formErrors['companyVatNumber'] = ['required' => true];
            }
        }

        if (!$country) {
            $formErrors['country'] = ['required' => true];
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

        return $formErrors;
    }

    private function unsetOrder() {
        global $ORDER_TOKEN;

        unset($_COOKIE[$ORDER_TOKEN]);
        setcookie($ORDER_TOKEN, '', time() - 300, '/');
    }

    public function view() {
        $order = $this->getOrder();

        if (is_null($order)) {
            $orderItems = [];
        } else {
            $orderItems = ModelOrderItem::getOrderItemsByOrder($order->id);
        }

        $breadcrumbs = [
            [
                'link' => '/',
                'label' => 'Home'
            ],
            [
                'label' => 'Checkout'
            ]
        ];

        include(__DIR__ . '/../../views/customer/checkout.php');
    }

    public function submit() {
        global $ORDER_STATUSES;

        $order = $this->getOrder();

        if ($order->state !== $ORDER_STATUSES['NEW']) {
            echo 'Order is already complted';
            $this->unsetOrder();
            return;
        }

        $formErrors = $this->validateSubmitForm($_POST);

        if (count($formErrors)) {
            echo 'Form is invalid';
            return;
        }

        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $phoneNumber = $_POST['phoneNumber'];
        $isCompany = isset($_POST['isCompany']) ? ($_POST['isCompany'] === 'on' ? 1 : 0) : 0;
        $companyName = $_POST['companyName'] ?? '';
        $companyVatNumber = $_POST['companyVatNumber'] ?? '';
        $country = $_POST['country'];
        $region = $_POST['region'] ?? '';
        $city = $_POST['city'];
        $street = $_POST['street'];
        $houseNumber = $_POST['houseNumber'];
        $appartmentNumber = $_POST['appartmentNumber'] ?? '';
        $notes = $_POST['notes'] ?? '';

        $customer = new ModelCustomer([
            'firstName' => $firstName,
            'lastName' => $lastName,
            'email' => $email,
            'phoneNumber' => $phoneNumber,
            'isCompany' => $isCompany,
            'companyName' => $companyName,
            'companyVatNumber' => $companyVatNumber
        ]);

        $address = new ModelAddress([
            'country' => $country,
            'region' => $region,
            'city' => $city,
            'street' => $street,
            'houseNumber' => $houseNumber,
            'appartmentNumber' => $appartmentNumber,
            'notes' => $notes
        ]);

        var_dump($customer);

        $customer->save();
        $address->save();

        $order->customerId = $customer->id;
        $order->addressId = $address->id;
        $order->state = $ORDER_STATUSES['COMPLETED'];

        var_dump($order);

        $order->save();
        $this->unsetOrder();

        echo 'Order success';
    }
}
