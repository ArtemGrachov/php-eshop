<tr>
    <td>
        <?= $address->id ?>
    </td>
    <td>
        <?= $address->country ?>
    </td>
    <td>
        <?= $address->region ?>
    </td>
    <td>
        <?= $address->city ?>
    </td>
    <td>
        <?= $address->street ?>
    </td>
    <td>
        <?= $address->houseNumber ?>
    </td>
    <td>
        <?= $address->appartmentNumber ?>
    </td>
    <td>
        <?= $address->notes ?>
    </td>
    <td>
        <div class="buttons">
            <a
                href="/admin/addresses/edit?id=<?= $address->id ?>"
                class="button is-info"
            >
                Edit
            </a>
            <form action="/admin/addresses/delete" method="POST">
                <input type="hidden" name="id" value="<?= $address->id ?>" />
                <button class="button is-danger">
                    Delete
                </button>
            </form>
        </div>
    </td>
</tr>
