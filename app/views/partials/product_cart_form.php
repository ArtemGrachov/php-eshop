<form action="/order/add" method="POST">
    <input type="hidden" name="productId" value="<?= $product->id ?>" />
    <div class="is-flex is-align-items-center">
        <div class="cart-form-counter mr-2">
            <input
                name="quantity"
                class="input is-rounded has-text-centered"
                type="number"
                value="0"
                min="1"
                max="<?= $product->tracking ? $product->stock : '' ?>"
            />
        </div>
        <button class="button is-success is-rounded is-medium">
            <?= ServiceI18n::t('partials.product_cart_form.add_to_cart') ?>
        </button>
    </div>
</form>
