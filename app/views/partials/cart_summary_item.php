<li class="p-2 is-flex is-align-items-center is-size-6<?= isset($itemClassNames) ? (' ' . $itemClassNames) : '' ?>">
    <a
        href="/product?id=<?= $cartItem->productId ?>"
        class="cart-summary-item-image scalable-image-wrap is-flex-grow-0 is-flex-shrink-0 mr-4 has-background-info-light"
    >
        <?php if ($cartItem->imagePath): ?>
            <img
                alt="<?= $cartItem->name ?>"
                src="<?= $cartItem->imagePath ?>"
                class="scalable-image"
            />
        <?php endif ?>
    </a>
    <div class="is-flex-grow-1 is-flex-shrink-1">
        <a
            href="/product?id=<?= $cartItem->productId ?>"
            class="has-text-weight-semibold"
        >
            <?= $cartItem->name ?>
        </a>
        <div>
            <?= ServiceCurrency::getInstance()->formatPrice($cartItem->price); ?>
        </div>
    </div>
    <div class="is-flex-grow-0 is-flex-shrink-0 has-text-weight-semibold has-text-right ml-2">
        <?= ServiceCurrency::getInstance()->formatPrice($cartItem->total); ?>
    </div>
</li>