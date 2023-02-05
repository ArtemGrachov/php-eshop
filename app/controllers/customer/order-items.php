<?php
require_once(__DIR__ . '/../../models/order_item.php');

class ControllerOrderItems {
    public function remove() {
        global $ORDER_TOKEN;

        $productId = (int) $_GET['productId'];

        if (!isset($productId)) {
            throw new Exception('Product ID not set');
        }

        if (isset($_COOKIE[$ORDER_TOKEN])) {
            $orderToken = $_COOKIE[$ORDER_TOKEN];

            $order = ModelOrder::getOrderByToken($orderToken);
        }

        if (!$order) {
            throw new Exception('Order does not exist');
        }

        $order->removeItem($productId);

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
