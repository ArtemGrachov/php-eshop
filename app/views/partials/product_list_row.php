<tr>
    <td>
        <?= $product->id ?>
    </td>
    <td>
        <?= $product->name ?>
    </td>
    <td>
        <?= $product->price ?>
    </td>
    <td>
        <?= $product->description ?>
    </td>
    <td>
        <?= $product->tracking ? $product->stock : '-' ?>
    </td>
    <td>
        --
    </td>
    <td>
        <div class="buttons">
            <a
                href="/admin/products/edit?id=<?= $product->id ?>"
                class="button is-info"
            >
                Edit
            </a>
            <button class="button is-danger">
                Delete
            </button>
        </div>
    </td>
</tr>