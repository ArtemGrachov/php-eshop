<?php
    require_once(__DIR__ . '/../../../widgets/pagination.php');
    include(__DIR__ . '/../../../views/partials/admin_header.php');
?>

<div class="container">
    <div class="mb-4 is-flex is-justify-content-space-between is-align-content-center">
        <a href="/admin">
            <?= ServiceI18n::t('admin.view_users_list.return') ?>
        </a>
        <div class="buttons">
            <a
                href="/admin/users/create"
                class="button is-link"
            >
                <?= ServiceI18n::t('admin.view_users_list.create_user') ?>
            </a>
        </div>
    </div>
    <table class="table is-fullwidth mb-4">
        <thead>
            <tr>
                <th><?= ServiceI18n::t('admin.view_users_list.id') ?></th>
                <th><?= ServiceI18n::t('admin.view_users_list.email') ?></th>
                <th><?= ServiceI18n::t('admin.view_users_list.username') ?></th>
                <th><?= ServiceI18n::t('admin.view_users_list.actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $index => $user): ?>
                <?php include(__DIR__ . '/../../partials/user_list_row.php'); ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="py-6">
        <?php (new WidgetPagination($usersTotal, $currentPage))->render(); ?>
    </div>
</div>

<?php include(__DIR__ . '/../../../views/partials/delete_modal.php'); ?>
<?php include(__DIR__ . '/../../../views/partials/admin_footer.php'); ?>
