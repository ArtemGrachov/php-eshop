<?php
    require_once(__DIR__ . '/../../../widgets/order_state_select.php');

    global $ORDER_STATUSES;

    if (isset($order)) {
        $orderState = $order->state;
        $orderNote = $order->note;
        $orderToken = $order->token;
        $orderCustomerId = $order->customerId;
        $orderAddressId = $order->addressId;
    } else {
        $orderState = $ORDER_STATUSES['NEW'];
        $orderNote = '';
        $orderToken = '';
        $orderCustomerId = null;
        $orderAddressId = null;
    }
?>

<?php include(__DIR__ . '/../../../views/partials/admin_header.php'); ?>

<div class="container">
    <div class="mb-4">
        <a href="/admin/orders">
            Return to orders list
        </a>
    </div>

    <div class="columns">
        <div class="column is-half">
            <form action="<?= $formAction ?>" method="post">
                <div class="field">
                    <label
                        for="token"
                        class="label"
                    >
                        Token
                    </label>
                    <div class="control">
                        <input
                            class="input"
                            type="text"
                            name="token"
                            placeholder="Token"
                            required
                            value="<?= $orderToken ?>"
                        />
                    </div>
                </div>
                <div class="field">
                    <label for="state" class="label">
                        State
                    </label>
                    <div class="select is-fullwidth">
                        <?php (new WidgetOrderStateSelect($orderState))->render(); ?>
                    </div>
                </div>
                <div class="field">
                    <label for="customerId" class="label">
                        Customer
                    </label>
                    <div class="select is-fullwidth">
                        <?php
                            $customerSelectValue = $orderCustomerId;
                            include(__DIR__ . '/../../partials/customer_select.php')
                        ?>
                    </div>
                </div>
                <div class="field">
                    <label for="addressId" class="label">
                        Address
                    </label>
                    <div class="select is-fullwidth">
                        <?php
                            $addressSelectValue = $orderAddressId;
                            include(__DIR__ . '/../../partials/address_select.php')
                        ?>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Note</label>
                    <div class="control">
                        <textarea
                            class="textarea"
                            name="note"
                            id="note"
                            cols="30"
                            rows="10"
                            placeholder="Note"
                        ><?= $orderNote ?></textarea>
                    </div>
                </div>
                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include(__DIR__ . '/../../../views/partials/admin_footer.php'); ?>
