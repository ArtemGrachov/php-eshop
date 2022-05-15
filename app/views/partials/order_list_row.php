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
                Edit
            </a>
            <form action="/admin/orders/delete" metdod="POST">
                <input type="hidden" name="id" value="<?= $order->id ?>" />
                <button class="button is-danger">
                    Delete
                </button>
            </form>
        </div>
    </td>
</tr>
