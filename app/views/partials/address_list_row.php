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
                <button
                    class="button is-danger delete-trigger"
                    data-question="Are you sure you want to delete address &quot;<?= implode(', ', [$address->country, $address->region, $address->city, $address->street, $address->houseNumber, $address->appartmentNumber]) ?>&quot;?"
                >
                    Delete
                </button>
            </form>
        </div>
    </td>
</tr>
