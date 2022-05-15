<?php

class WidgetOrderStateSelect {
    public function __construct($payload) {
        $this->stateSelectedValue = $payload ?? null;
    }

    public function render() {
        global $ORDER_STATUSES;
        $stateSelectedValue = $this->stateSelectedValue;
        $orderStates = [
            ['value' => $ORDER_STATUSES['NEW'], 'label' => 'New'],
            ['value' => $ORDER_STATUSES['PENDING'], 'label' => 'Pending'],
            ['value' => $ORDER_STATUSES['COMPLETED'], 'label' => 'Completed'],
            ['value' => $ORDER_STATUSES['CANCELLED'], 'label' => 'Cancelled']
        ];

        include(__DIR__ . '/../views/partials/order_state_select.php');
    }
}
