<?php include(__DIR__ . '/../partials/header.php'); ?>

<div class="container py-5 px-4">
    <div class="mb-5">
        <?php include(__DIR__ . '/../partials/breadcrumbs.php'); ?>
    </div>
    <div class="max-w-600px mx-auto">
        <ul class="list-reset mb-4">
            <?php
                foreach ($orderItems as $index => $cartItem) {
                    $itemClassNames = 'mb-4';

                    if ($index % 2 === 0) {
                        $itemClassNames .= ' has-background-white-bis';
                    }

                    include(__DIR__ . '/../partials/cart_item.php');
                }
            ?>
        </ul>
        <?php if (!is_null($order)): ?>
            <div class="has-background-info-light p-4 mb-4">
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
                            $1000.99
                        </td>
                    </tr>
                </table>
            </div>
        <?php endif; ?>
        <div class="is-flex is-justify-content-flex-end">
            <a
                href="/checkout"
                class="button is-success is-medium"
            >
                Checkout
            </a>
        </div>
    </div>
</div>

<?php include(__DIR__ . '/../partials/footer.php'); ?>
