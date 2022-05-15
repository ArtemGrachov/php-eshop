<tr>
    <td>
        <?= $taxon->id ?>
    </td>
    <td>
        <?= $taxon->name ?>
    </td>
    <td>
        <?= $taxon->description ?>
    </td>
    <td>
        <?= $taxon->productsCount ?>
    </td>
    <td>
        <div class="buttons">
            <a
                href="/admin/taxons/edit?id=<?= $taxon->id ?>"
                class="button is-info"
            >
                Edit
            </a>
            <form action="/admin/taxons/delete" method="POST">
                <input type="hidden" name="id" value="<?= $taxon->id ?>" />
                <button class="button is-danger">
                    Delete
                </button>
            </form>
        </div>
    </td>
</tr>
