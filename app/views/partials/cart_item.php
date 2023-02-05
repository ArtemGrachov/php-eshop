<li class="cart-item-row p-4<?= isset($itemClassNames) ? (' ' . $itemClassNames) : '' ?>">
    <div class="has-text-right">
        <a
            class="has-text-grey-light delete-trigger cart-item-delete-trigger"
            data-question="Are you sure you want to delete &quot;<?= $cartItem->name ?>&quot; from the cart?"
            href="/order-items/remove?productId=<?= $cartItem->productId ?>"
        >
            <span class="material-icons">
                close
            </span>
        </a>
    </div>
    <div class="is-flex is-align-items-center">
        <a
            href="/product?id=<?= $cartItem->productId ?>"
            class="cart-item-image scalable-image-wrap is-flex-grow-0 is-flex-shrink-0 mr-4 has-background-info-light"
        >
            <?php if ($cartItem->imagePath): ?>
                <img
                    alt="<?= $cartItem->name ?>"
                    src="<?= $cartItem->imagePath ?>"
                    class="scalable-image"
                />
            <?php endif ?>
        </a>
        <div class="is-flex-grow-1 is-flex-shrink-1 pr-4">
            <a
                href="/product?id=<?= $cartItem->productId ?>"
                class="is-size-5-tablet has-text-weight-semibold"
            >
                <?= $cartItem->name ?>
            </a>
            <div class="is-size-6 mb-2">
                <?= ServiceCurrency::getInstance()->formatPrice($cartItem->price); ?>
            </div>
            <form class="cart-item-form-quantity" action="/order/update" method="POST">
                <input type="hidden" name="productId" value="<?= $cartItem->productId ?>" />
                <input
                    class="cart-item-input-quantity input is-small max-w-80px has-text-centered"
                    type="number"
                    name="quantity"
                    value="<?= $cartItem->quantity ?>"
                />
                <button class="button is-small is-primary">
                    <span class="icon">
                        <span class="material-icons is-size-6">
                            done
                        </span>
                    </span>
                </button>
            </form>
        </div>
        <div class="is-flex-grow-0 is-flex-shrink-0 is-size-6 has-text-weight-semibold has-text-right">
            <?= ServiceCurrency::getInstance()->formatPrice($cartItem->total); ?>
        </div>
    </div>
</li>