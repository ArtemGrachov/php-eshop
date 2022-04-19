<article class="box">
    <a href="/product?id=<?= $product->id ?>">
        <div class="product-image scalable-image-wrap mb-4">
            <div class="scalable-image has-background-info-light"></div>
        </div>
    </a>
    <div class="is-flex is-justify-content-space-between is-align-items-center">
        <a
            href="/product?id=<?= $product->id ?>"
            class="title is-6 mb-0 mr-2"
        >
            <?= $product->name ?>
        </a>
        <div class="ml-2">
            $<?= $product->price ?>
        </div>
    </div>
</article>
