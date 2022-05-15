<?php
require_once(__DIR__ . '/../../../models/order.php');
require_once(__DIR__ . '/../../../models/customer.php');
require_once(__DIR__ . '/../../../models/address.php');

class ControllerAdminOrdersForm {
    public function index() {
        $title = 'Create order';
        $formAction = '/admin/orders/create';
        $customers = ModelCustomer::getCustomers();
        $addresses = ModelAddress::getAddresses();

        include(__DIR__ . '/../../../views/admin/orders/form.php');
    }

    public function create() {
        $payload = [
            'state' => $_POST['state'],
            'note' => $_POST['note'],
            'token' => $_POST['token'],
            'customerId' => (int) $_POST['customerId'],
            'addressId' => (int) $_POST['addressId']
        ];

        $order = new ModelOrder($payload);
        $order->save();

        header('Location: /admin/orders');
    }

    public function edit() {
        $orderId = $_GET['id'];
        $title = "Edit order $orderId";
        $formAction = "/admin/orders/edit?id=$orderId";

        $order = ModelOrder::getOrder($orderId);
        $customers = ModelCustomer::getCustomers();
        $addresses = ModelAddress::getAddresses();

        include(__DIR__ . '/../../../views/admin/orders/form.php');
    }

    public function save() {
        $orderId = $_GET['id'];

        $state = $_POST['state'];
        $note = $_POST['note'];
        $token = $_POST['token'];
        $customerId = $_POST['customerId'];
        $addressId = $_POST['addressId'];

        $order = ModelOrder::getOrder($orderId);

        $order->state = $state;
        $order->note = $note;
        $order->token = $token;
        $order->customerId = $customerId;
        $order->addressId = $addressId;

        $order->save();

        header('Location: /admin/orders');
    }
}
