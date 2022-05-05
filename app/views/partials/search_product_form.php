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
            placeholder="Type a query..."
            value="<?= $serchFormQuery ?? '' ?>"
        />
    </div>
    <div class="control">
        <button
            type="submit"
            class="button is-info"
        >
            Search
        </button>
    </div>
    </div>
</form>