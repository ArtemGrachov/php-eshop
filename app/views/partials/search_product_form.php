<form
    action="/search/product"
    method="GET"
    class="is-flex"
>
    <div class="field has-addons">
    <div class="control">
        <input
            class="input is-link"
            name="query"
            type="text"
            placeholder="<?= ServiceI18n::t('partials.search_product_form.placeholder_query') ?>"
            value="<?= $serchFormQuery ?? '' ?>"
        />
    </div>
    <div class="control">
        <button
            type="submit"
            class="button is-info"
        >
            <?= ServiceI18n::t('partials.search_product_form.label_submit') ?>
        </button>
    </div>
    </div>
</form>