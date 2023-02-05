<?php include(__DIR__ . '/../partials/header.php'); ?>

<div class="container py-5 px-4">
    <div class="mb-5">
        <?php include(__DIR__ . '/../partials/breadcrumbs.php'); ?>
    </div>
    <div class="max-w-600px mx-auto">
        <h1 class="has-text-centered is-size-2 has-text-success">
            <?= ServiceI18n::t('customer.view_checkout_success.title') ?>
        </h1>
        <p class="has-text-centered mb-4">
            <?= ServiceI18n::t('customer.view_checkout_success.email', [ 'email' => $email ]) ?>
        </p>
        <ul class="list-reset mb-4">
            <?php
                foreach ($orderItems as $index => $cartItem) {
                    $itemClassNames = 'mb-4';

                    if ($index % 2 === 0) {
                        $itemClassNames .= ' has-background-white-bis';
                    }

                    include(__DIR__ . '/../partials/checkout_success_item.php');
                }
            ?>
        </ul>
        <?php if (!is_null($order)): ?>
            <div class="mb-4">
                <?php include(__DIR__ . '/../partials/cart_summary.php'); ?>
            </div>
        <?php endif; ?>
        <div class="is-flex is-justify-content-flex-end">
            <a
                href="/"
                class="button is-success is-medium"
            >
                <?= ServiceI18n::t('customer.view_checkout_success.return') ?>
            </a>
        </div>
    </div>
</div>

<?php include(__DIR__ . '/../partials/footer.php'); ?>
