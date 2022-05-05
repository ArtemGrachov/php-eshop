<li class="p-2 is-flex is-align-items-center is-size-6<?= isset($itemClassNames) ? (' ' . $itemClassNames) : '' ?>">
    <a
        href="/product?id=<?= $cartItem->productId ?>"
        class="cart-summary-item-image scalable-image-wrap is-flex-grow-0 is-flex-shrink-0 mr-4"
    >
        <div class="scalable-image has-background-info-light"></div>
    </a>
    <div class="is-flex-grow-1 is-flex-shrink-1">
        <a
            href="/product?id=<?= $cartItem->productId ?>"
            class="has-text-weight-semibold"
        >
            <?= $cartItem->name ?>
        </a>
        <div>
            <?= number_format($cartItem->price, 2, '.', ' ') ?>&nbsp;UAH
        </div>
    </div>
    <div class="is-flex-grow-0 is-flex-shrink-0 has-text-weight-semibold has-text-right ml-2">
        <?= number_format($cartItem->total, 2, '.', ' ') ?>&nbsp;UAH
    </div>
</li>