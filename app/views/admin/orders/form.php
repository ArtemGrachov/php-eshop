<?php
    require_once(__DIR__ . '/../../../widgets/form_error.php');
    require_once(__DIR__ . '/../../../widgets/order_state_select.php');
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
                            value="<?= $formValue['token'] ?>"
                        />
                    </div>
                    <?php (new WidgetFormError($formErrors['token'] ?? []))->render(); ?>
                </div>
                <div class="field">
                    <label for="state" class="label">
                        State
                    </label>
                    <div class="select is-fullwidth">
                        <?php (new WidgetOrderStateSelect($formValue['state']))->render(); ?>
                    </div>
                    <?php (new WidgetFormError($formErrors['state'] ?? []))->render(); ?>
                </div>
                <div class="field">
                    <label for="customerId" class="label">
                        Customer
                    </label>
                    <div class="select is-fullwidth">
                        <?php
                            $customerSelectValue = $formValue['customerId'];
                            include(__DIR__ . '/../../partials/customer_select.php')
                        ?>
                    </div>
                    <?php (new WidgetFormError($formErrors['customerId'] ?? []))->render(); ?>
                </div>
                <div class="field">
                    <label for="addressId" class="label">
                        Address
                    </label>
                    <div class="select is-fullwidth">
                        <?php
                            $addressSelectValue = $formValue['addressId'];
                            include(__DIR__ . '/../../partials/address_select.php')
                        ?>
                    </div>
                    <?php (new WidgetFormError($formErrors['addressId'] ?? []))->render(); ?>
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
                        ><?= $formValue['note'] ?></textarea>
                    </div>
                    <?php (new WidgetFormError($formErrors['name'] ?? []))->render(); ?>
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
