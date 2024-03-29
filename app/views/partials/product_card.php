<article class="box p-0 is-flex is-flex-direction-column product-card">
    <a href="/product?id=<?= $product->id ?>">
        <div class="product-image scalable-image-wrap has-background-info-light">
            <?php if ($product->image): ?>
                <img
                    alt="<?= $product->name ?>"
                    src="<?= $product->imagePath ?>"
                    class="scalable-image"
                />
            <?php endif ?>
        </div>
    </a>
    <a
        href="/product?id=<?= $product->id ?>"
        class="p-4 is-flex is-flex-direction-column is-flex-grow-1"
    >
        <div class="title is-6 mb-2">
            <?= $product->name ?>
        </div>
        <div class="mt-auto">
            <?php if ($product->isOutOfStock): ?>
                <span class="tag is-danger">Out of stock</span>
            <?php else: ?>
                <?php if ($product->runningOutOfStock): ?>
                    <span class="tag is-warning mb-2">
                        <?= ServiceI18n::t('partials.product_card.out_of_stock') ?>
                    </span>
                <?php endif ?>
                <div class="has-color-dark">
                    <?= ServiceCurrency::getInstance()->formatPrice($product->price); ?>
                </div>
            <?php endif ?>
        </div>
    </a>
</article>
