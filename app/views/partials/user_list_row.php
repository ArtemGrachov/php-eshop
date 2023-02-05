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
                <button
                    class="button is-danger delete-trigger"
                    data-question="Are you sure you want to delete user &quot;<?= $user->username ?>&quot; (<?= $user->email ?>)?"
                >
                    Delete
                </button>
            </form>
        </div>
    </td>
</tr>
