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
                <button
                    type="submit"
                    class="button is-danger delete-trigger"
                    data-question="Are you sure you want to delete taxon &quot;<?= $taxon->name ?>&quot;?"
                >
                    Delete
                </button>
            </form>
        </div>
    </td>
</tr>
