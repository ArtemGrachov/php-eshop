<?php

class ControllerCart {
    public function view() {
        $order = $this->getOrder();

        if (is_null($order)) {
            $orderItems = [];
        } else {
            $orderItems = ModelOrderItem::getOrderItemsByOrder($order->id);
        }

        $title = ServiceI18n::t('customer.title_page', [ 'page' => ServiceI18n::t('customer.view_cart.title') ]);

        $breadcrumbs = [
            [
                'link' => '/',
                'label' => ServiceI18n::t('customer.home')
            ],
            [
                'label' => ServiceI18n::t('customer.view_cart.title')
            ]
        ];

        include(__DIR__ . '/../../views/customer/cart.php');
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
