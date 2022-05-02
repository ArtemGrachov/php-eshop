<div class="has-background-info-light p-4">
    <table class="table is-fullwidth has-background-info-light">
        <tr>
            <td>
                Total items:
            </td>
            <td class="has-text-right">
                <?= $order->itemsCount ?>
            </td>
        </tr>
        <tr class="is-size-5 has-text-weight-semibold">
            <td>
                Total price:
            </td>
            <td class="has-text-right">
                $<?= $order->totalPrice ?>
            </td>
        </tr>
    </table>
</div>
