<?php
require_once(__DIR__ . '/../../models/order_item.php');

class ControllerOrderItems {
    public function remove() {
        global $ORDER_TOKEN;

        $orderItemId = (int) $_GET['id'];

        if (!isset($orderItemId)) {
            throw new Exception('Order item ID not set');
        }

        $orderItem = ModelOrderItem::getOrderItem($orderItemId);

        if ($orderItem) {
            $orderItem->remove();
        }

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
