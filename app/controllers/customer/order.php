<?php
require_once(__DIR__ . '/../../models/order.php');

class ControllerOrder {
    public function addOrCreate() {
        global $ORDER_TOKEN;

        $productId = $_POST['productId'];
        $quantity = $_POST['quantity'];

        if (!isset($productId)) {
            throw 'Product ID not set';
        }

        if (!isset($quantity)) {
            throw 'Quantity not set';
        }

        if (isset($_COOKIE[$ORDER_TOKEN])) {
            $orderToken = $_COOKIE[$ORDER_TOKEN];

            $order = ModelOrder::getOrderByToken($orderToken);

            if (!$order) {
                $order = $this->createOrder();
            }
        } else {
            $order = $this->createOrder();
        }

        if ($order->id === null) {
            $order->save();
        }

        $order->addItem($productId, $quantity);

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function createOrder() {
        global $ORDER_TOKEN;
        global $ORDER_STATUSES;

        $orderToken = bin2hex(openssl_random_pseudo_bytes(10));

        setcookie($ORDER_TOKEN, $orderToken, 0, '/');

        $order = new ModelOrder([
            'state' => $ORDER_STATUSES['NEW'],
            'token' => $orderToken,
            'note' => ''
        ]);

        return $order;
    }
}
