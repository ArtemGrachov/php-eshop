<div class="has-background-info-light p-4">
    <table class="table is-fullwidth has-background-info-light">
        <tr>
            <td>
                <?= ServiceI18n::t('partials.cart_summary.total_items') ?>
            </td>
            <td class="has-text-right">
                <?= $order->itemsCount ?>
            </td>
        </tr>
        <tr class="is-size-5 has-text-weight-semibold">
            <td>
                <?= ServiceI18n::t('partials.cart_summary.total_price') ?>
            </td>
            <td class="has-text-right">
                <?= ServiceCurrency::getInstance()->formatPrice($order->totalPrice); ?>
            </td>
        </tr>
    </table>
</div>
