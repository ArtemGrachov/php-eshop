<?php include(__DIR__ . '/../partials/header.php'); ?>

<div class="container py-5 px-4">
    <div class="mb-5">
        <?php include(__DIR__ . '/../partials/breadcrumbs.php'); ?>
    </div>
    <div class="columns">
        <div class="column is-4 order-1-tablet">
            <h2 class="is-size-5 mb-4">
                <?= ServiceI18n::t('customer.view_checkout.cart_summary') ?>
            </h2>
            <div class="mb-4">
                <ul class="list-reset">
                    <?php
                        foreach ($orderItems as $index => $cartItem) {
                            $itemClassNames = 'mb-4';
    
                            if ($index % 2 === 0) {
                                $itemClassNames .= ' has-background-white-bis';
                            }
    
                            include(__DIR__ . '/../partials/cart_summary_item.php');
                        }
                    ?>
                </ul>
            </div>
            <table class="table is-fullwidth has-background-info-light">
                <tr class="is-size-6">
                    <td>
                        <?= ServiceI18n::t('customer.view_checkout.total_items') ?>
                    </td>
                    <td class="has-text-right">
                        <?= $order->itemsCount ?>
                    </td>
                </tr>
                <tr class="is-size-6 has-text-weight-semibold">
                    <td>
                        <?= ServiceI18n::t('customer.view_checkout.total_price') ?>
                    </td>
                    <td class="has-text-right">
                        <?= ServiceCurrency::getInstance()->formatPrice($order->totalPrice); ?>
                    </td>
                </tr>
            </table>
            <div class="is-flex is-justify-content-flex-end">
                <a
                    href="/cart"
                    class="button is-info is-small"
                >
                    <span class="icon mr-1">
                        <span class="material-icons is-size-6">
                            mode_edit
                        </span>
                    </span>
                    <?= ServiceI18n::t('customer.view_checkout.edit_cart') ?>
                </a>
            </div>
        </div>
        <div class="column is-8">
            <form action="/checkout" method="POST">
                <div class="mb-4">
                    <?php include(__DIR__ . '/../partials/checkout_customer_form_part.php'); ?>
                </div>
                <div class="mb-4">
                    <?php include(__DIR__ . '/../partials/checkout_address_form_part.php'); ?>
                </div>
                <div class="mb-4">
                    <?php include(__DIR__ . '/../partials/cart_summary.php'); ?>
                </div>
                <button class="button is-success is-large">
                    <span class="icon mr-2">
                        <span class="material-icons">
                            done
                        </span>
                    </span>
                    <?= ServiceI18n::t('customer.view_checkout.submit_order') ?>
                </button>
            </form>
        </div>
    </div>
</div>

<?php include(__DIR__ . '/../partials/footer.php'); ?>
