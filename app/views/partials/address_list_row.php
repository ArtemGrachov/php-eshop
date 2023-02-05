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
                <?= ServiceI18n::t('common.edit') ?>
            </a>
            <form action="/admin/addresses/delete" method="POST">
                <input type="hidden" name="id" value="<?= $address->id ?>" />
                <button
                    class="button is-danger delete-trigger"
                    data-question="<?= ServiceI18n::t('partials.address_list_row.delete_question', [ 'address' => implode(', ', [$address->country, $address->region, $address->city, $address->street, $address->houseNumber, $address->appartmentNumber]) ]) ?>"
                >
                    <?= ServiceI18n::t('common.delete') ?>
                </button>
            </form>
        </div>
    </td>
</tr>
