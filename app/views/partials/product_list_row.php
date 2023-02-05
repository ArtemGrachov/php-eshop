<tr>
    <td>
        <?= $product->id ?>
    </td>
    <td>
        <?= $product->name ?>
    </td>
    <td>
        <?= ServiceCurrency::getInstance()->formatPrice($product->price); ?>
    </td>
    <td>
        <?= $product->description ?>
    </td>
    <td>
        <?= $product->tracking ? $product->stock : '-' ?>
    </td>
    <td>
        <?= $product->taxon ? $product->taxon->name : '--' ?>
    </td>
    <td>
        <div class="buttons">
            <a
                href="/admin/products/edit?id=<?= $product->id ?>"
                class="button is-info"
            >
                Edit
            </a>
            <form action="/admin/products/delete" method="POST">
                <input type="hidden" name="id" value="<?= $product->id ?>" />
                <button
                    class="button is-danger delete-trigger"
                    data-question="Are you sure you want to delete product &quot;<?= $product->name ?>&quot;?"
                >
                    Delete
                </button>
            </form>
        </div>
    </td>
</tr>
