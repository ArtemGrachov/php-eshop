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
            <div class="mb-4">
                <?php include(__DIR__ . '/../partials/cart_summary.php'); ?>
            </div>
            <div class="is-flex is-justify-content-flex-end">
                <a
                    href="/checkout"
                    class="button is-success is-medium"
                >
                    Checkout
                </a>
            </div>
        <?php else: ?>
            <div class="is-size-3 has-text-centered">
                The cart is empty
            </div>
        <?php endif; ?>
    </div>
</div>

<?php include(__DIR__ . '/../partials/delete_modal.php'); ?>
<?php include(__DIR__ . '/../partials/footer.php'); ?>
