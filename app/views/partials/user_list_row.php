<tr>
    <td>
        <?= $user->id ?>
    </td>
    <td>
        <?= $user->email ?>
    </td>
    <td>
        <?= $user->username ?>
    </td>
    <td>
        <div class="buttons">
            <a
                href="/admin/users/edit?id=<?= $user->id ?>"
                class="button is-info"
            >
                Edit
            </a>
            <form action="/admin/users/delete" method="POST">
                <input type="hidden" name="id" value="<?= $user->id ?>" />
                <button class="button is-danger">
                    Delete
                </button>
            </form>
        </div>
    </td>
</tr>
