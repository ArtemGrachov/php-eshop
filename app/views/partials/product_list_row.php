<tr>
    <td>
        <?= $product->id ?>
    </td>
    <td>
        <?= $product->name ?>
    </td>
    <td>
        <?= number_format($product->price, 2, '.', ' ') ?>&nbsp;UAH
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
                <button class="button is-danger">
                    Delete
                </button>
            </form>
        </div>
    </td>
</tr>
