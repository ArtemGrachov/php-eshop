<?php
require_once(__DIR__ . '/../../models/product.php');
require_once(__DIR__ . '/../../models/taxon.php');

class ControllerCheckout {
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

    private function getOrder() {
        global $ORDER_TOKEN;

        $orderToken = isset($_COOKIE[$ORDER_TOKEN]) ? $_COOKIE[$ORDER_TOKEN] : null;

        if (!$orderToken) {
            return null;
        }

        return ModelOrder::getOrderByToken($orderToken);
    }
}
