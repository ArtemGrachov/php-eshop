<?php
require_once(__DIR__ . '/../../../models/order.php');
require_once(__DIR__ . '/../../../models/customer.php');
require_once(__DIR__ . '/../../../models/address.php');
require_once(__DIR__ . '/../../../traits/page-admin-auth.php');

class ControllerAdminOrdersForm {
    use TraitPageAdminAuth;

    private function validateForm($formValue) {
        $formErrors = [];

        $state = $_POST['state'] ?? null;
        $note = $_POST['note'] ?? null;
        $token = $_POST['token'] ?? null;
        $customerId = $_POST['customerId'] ?? null;
        $addressId = $_POST['addressId'] ?? null;

        if (!$state) {
            $formErrors['state'] = ['required' => true];
        }

        if (!$note) {
            $formErrors['note'] = ['required' => true];
        }

        if (!$token) {
            $formErrors['token'] = ['required' => true];
        }

        if (!$customerId) {
            $formErrors['customerId'] = ['required' => true];
        }

        if (!$addressId) {
            $formErrors['addressId'] = ['required' => true];
        }

        return $formErrors;
    }

    public function index() {
        global $ORDER_STATUSES;

        $this->viewInit([
            'title' => ServiceI18n::t('admin.view_orders_form.create_order'),
            'formAction' => '/admin/orders/create',
            'formErrors' => [],
            'formValue' => [
                'state' => $ORDER_STATUSES['NEW'],
                'note' => '',
                'token' => '',
                'customerId' => null,
                'addressId' => null
            ]
        ]);
    }

    private function viewInit($data) {
        $title = $data['title'];
        $customers = ModelCustomer::getCustomers();
        $addresses = ModelAddress::getAddresses();
        $formAction = $data['formAction'];
        $formErrors = $data['formErrors'];
        $formValue = $data['formValue'];

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

        $formErrors = $this->validateForm($_POST);

        if (count($formErrors)) {
            $this->viewInit([
                'title' => ServiceI18n::t('admin.view_orders_form.create_order'),
                'formAction' => '/admin/orders/create',
                'formErrors' => $formErrors,
                'formValue' => $_POST
            ]);
            return;
        }

        $order = new ModelOrder($payload);
        $order->save();

        header('Location: /admin/orders');
    }

    public function edit() {
        $orderId = $_GET['id'];

        $order = ModelOrder::getOrder($orderId);

        if (is_null($order)) {
            throw new ExtendedException(
                'Not found',
                ['code' => 404]
            );
        }

        $this->viewInit([
            'title' => ServiceI18n::t('admin.view_orders_form.edit_order', [ 'orderId' => $orderId ]),
            'formAction' => "/admin/orders/edit?id=$orderId",
            'formErrors' => [],
            'formValue' => [
                'state' => $order->state,
                'note' => $order->note,
                'token' => $order->token,
                'customerId' => $order->customerId,
                'addressId' => $order->addressId
            ]
        ]);
    }

    public function save() {
        $orderId = $_GET['id'];

        $state = $_POST['state'];
        $note = $_POST['note'];
        $token = $_POST['token'];
        $customerId = $_POST['customerId'];
        $addressId = $_POST['addressId'];

        $order = ModelOrder::getOrder($orderId);

        $formErrors = $this->validateForm($_POST);

        if (count($formErrors)) {
            $this->viewInit([
                'title' => ServiceI18n::t('admin.view_orders_form.edit_order', [ 'orderId' => $orderId ]),
                'formAction' => "/admin/orders/edit?id=$orderId",
                'order' => $order,
                'formErrors' => $formErrors,
                'formValue' => $_POST
            ]);
            return;
        }

        $order->state = $state;
        $order->note = $note;
        $order->token = $token;
        $order->customerId = $customerId;
        $order->addressId = $addressId;

        $order->save();

        header('Location: /admin/orders');
    }
}
