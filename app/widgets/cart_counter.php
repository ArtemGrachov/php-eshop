<?php

class WidgetCartCounter {
    public function render() {
        $order = $this->getData();

        $quantity = is_null($order) ? 0 : $order->itemsCount;

        include(__DIR__ . '/../views/partials/cart_counter.php');
    }

    private function getData() {
        global $ORDER_TOKEN;

        $orderToken = isset($_COOKIE[$ORDER_TOKEN]) ? $_COOKIE[$ORDER_TOKEN] : null;

        if (!$orderToken) {
            return null;
        }

        return ModelOrder::getOrderByToken($orderToken);
    }
}
