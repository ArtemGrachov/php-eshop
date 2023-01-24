<?php
require_once(__DIR__ . '/../../../models/order.php');
require_once(__DIR__ . '/../../../traits/page-admin-auth.php');
require_once(__DIR__ . '/../../../constants/pagination.php');

class ControllerAdminOrdersList {
    use TraitPageAdminAuth;

    public function index() {
        global $PAGINATION_LIMIT;

        $title = 'Orders';
        $page = $_GET['page'] ?? 1;

        $orders = ModelOrder::getOrders(
            $PAGINATION_LIMIT,
            ($page - 1) * $PAGINATION_LIMIT
        );

        include(__DIR__ . '/../../../views/admin/orders/list.php');
    }

    public function remove () {
        $orderId = $_POST['id'];
        $order = ModelOrder::getOrder($orderId);
        $order->remove();
        header('Location: /admin/orders');
    }
}
