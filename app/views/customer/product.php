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
            <div class="is-size-5 mb-5">
                <?= number_format($product->price, 2, '.', '') ?>&nbsp;UAH
            </div>
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
