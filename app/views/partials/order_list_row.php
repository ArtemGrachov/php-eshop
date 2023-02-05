<tr>
    <td>
        <?= $order->id ?>
    </td>
    <td>
        <?= $order->token ?>
    </td>
    <td>
        <?= $order->state ?>
    </td>
    <td>
        <?= $order->customer ? $order->customer->textFull : '-' ?>
    </td>
    <td>
        <?= $order->address ? $order->address->textFull : '-' ?>
    </td>
    <td>
        <?= $order->note ?>
    </td>
    <td>
        <div class="buttons">
            <a
                href="/admin/orders/edit?id=<?= $order->id ?>"
                class="button is-info"
            >
                <?= ServiceI18n::t('common.edit') ?>
            </a>
            <form action="/admin/orders/delete" metdod="POST">
                <input type="hidden" name="id" value="<?= $order->id ?>" />
                <button
                    class="button is-danger delete-trigger"
                    data-question="Are you sure you want to delete order with ID: <?= $order->id ?>, TOKEN: <?= $order->token ?>?"
                >
                    <?= ServiceI18n::t('common.delete') ?>
                </button>
            </form>
        </div>
    </td>
</tr>
