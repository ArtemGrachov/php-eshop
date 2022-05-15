<?php
require_once(__DIR__ . '/../../../models/order.php');

class ControllerAdminOrdersList {
    public function index() {
        $title = 'Orders';
        $orders = ModelOrder::getOrders();

        include(__DIR__ . '/../../../views/admin/orders/list.php');
    }

    public function remove () {
        $orderId = $_POST['id'];
        $order = ModelOrder::getOrder($orderId);
        $order->remove();
        header('Location: /admin/orders');
    }
}
