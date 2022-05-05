<article class="box p-0 is-flex is-flex-direction-column product-card">
    <a href="/product?id=<?= $product->id ?>">
        <div class="product-image scalable-image-wrap">
            <div class="scalable-image has-background-info-light"></div>
        </div>
    </a>
    <a
        href="/product?id=<?= $product->id ?>"
        class="p-4 is-flex is-flex-direction-column is-flex-grow-1"
    >
        <div class="title is-6 mb-2">
            <?= $product->name ?>
        </div>
        <div class="has-color-dark mt-auto">
            $<?= $product->price ?>
        </div>
    </a>
</article>
