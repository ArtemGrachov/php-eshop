<?php include(__DIR__ . '/../partials/header.php'); ?>

<div class="container py-5 px-4">
    <div class="mb-5">
        <?php include(__DIR__ . '/../partials/breadcrumbs.php'); ?>
    </div>
    <div class="columns">
        <div class="column is-6">
            <div class="product-image scalable-image-wrap mb-4">
                <div class="scalable-image has-background-info-light"></div>
            </div>
        </div>
        <div class="column is-6">
            <h1 class="title mb-2">
                <?= $product->name ?>
            </h1>
            <?php if ($product->isOutOfStock): ?>
                <span class="tag is-danger my-4 is-size-6">Out of stock</span>
            <?php else: ?>
                <?php if ($product->runningOutOfStock): ?>
                    <span class="tag is-warning is-size-6 mt-4 mb-2">
                        Is running out of stock
                    </span>
                <?php endif ?>
                <div class="is-size-5 mb-5">
                    <?= number_format($product->price, 2, '.', ' ') ?>&nbsp;UAH
                </div>
            <?php endif ?>
            <div class="mb-5">
                <?php include(__DIR__ . '/../partials/product_cart_form.php'); ?>
            </div>
            <p class="my-0">
                <?= $product->description ?>
            </p>
        </div>
    </div>
</div>

<?php include(__DIR__ . '/../partials/footer.php'); ?>
