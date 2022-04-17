<tr>
    <td>
        <?= $taxon['id'] ?>
    </td>
    <td>
        <?= $taxon['name'] ?>
    </td>
    <td>
        <?= $taxon['description'] ?>
    </td>
    <td>
        --
    </td>
    <td>
        <div class="buttons">
            <a
                href="/admin/taxons/edit?id=<?= $taxon['id'] ?>"
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
