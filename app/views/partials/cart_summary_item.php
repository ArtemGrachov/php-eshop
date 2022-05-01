<li class="p-2 is-flex is-align-items-center<?= isset($itemClassNames) ? (' ' . $itemClassNames) : '' ?>">
    <a
        href="/product?id=<?= $cartItem->productId ?>"
        class="cart-summary-item-image scalable-image-wrap is-flex-grow-0 is-flex-shrink-0 mr-4"
    >
        <div class="scalable-image has-background-info-light"></div>
    </a>
    <div class="is-flex-grow-1 is-flex-shrink-1 ">
        <a
            href="/product?id=<?= $cartItem->productId ?>"
            class="is-size-6 has-text-weight-semibold"
        >
            <?= $cartItem->name ?>
        </a>
        <div class="is-size-7">
            $<?= $cartItem->price ?>
        </div>
    </div>
    <div class="is-flex-grow-0 is-flex-shrink-0 is-size-7 has-text-weight-semibold has-text-right">
        $<?= $cartItem->total ?>
    </div>
</li>