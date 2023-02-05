<?php

class WidgetOrderStateSelect {
    public function __construct($payload) {
        $this->stateSelectedValue = $payload ?? null;
    }

    public function render() {
        global $ORDER_STATUSES;
        $stateSelectedValue = $this->stateSelectedValue;
        $orderStates = [
            ['value' => $ORDER_STATUSES['NEW'], 'label' => <?= ServiceI18n::t('common.order_status.new')],
            ['value' => $ORDER_STATUSES['PENDING'], 'label' => <?= ServiceI18n::t('common.order_status.pending')],
            ['value' => $ORDER_STATUSES['COMPLETED'], 'label' => <?= ServiceI18n::t('common.order_status.completed')],
            ['value' => $ORDER_STATUSES['CANCELLED'], 'label' => <?= ServiceI18n::t('common.order_status.cancelled')]
        ];

        include(__DIR__ . '/../views/partials/order_state_select.php');
    }
}
