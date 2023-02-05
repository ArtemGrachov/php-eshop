<?php
    require_once(__DIR__ . '/../../../widgets/pagination.php');
    include(__DIR__ . '/../../../views/partials/admin_header.php');
?>

<div class="container">
    <div class="mb-4 is-flex is-justify-content-space-between is-align-content-center">
        <a href="/admin">
            <?= ServiceI18n::t('admin.view_address_list.return') ?>
        </a>
        <div class="buttons">
            <a
                href="/admin/addresses/create"
                class="button is-link"
            >
                <?= ServiceI18n::t('admin.view_address_list.create_address') ?>
            </a>
        </div>
    </div>
    <table class="table is-fullwidth mb-4">
        <thead>
            <tr>
                <th><?= ServiceI18n::t('admin.view_address_list.id') ?></th>
                <th><?= ServiceI18n::t('admin.view_address_list.country') ?></th>
                <th><?= ServiceI18n::t('admin.view_address_list.region') ?></th>
                <th><?= ServiceI18n::t('admin.view_address_list.city') ?></th>
                <th><?= ServiceI18n::t('admin.view_address_list.street') ?></th>
                <th><?= ServiceI18n::t('admin.view_address_list.house_number') ?></th>
                <th><?= ServiceI18n::t('admin.view_address_list.appartment_number') ?></th>
                <th><?= ServiceI18n::t('admin.view_address_list.notes') ?></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($addresses as $index => $address): ?>
                <?php include(__DIR__ . '/../../partials/address_list_row.php'); ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="py-6">
        <?php (new WidgetPagination($addressesTotal, $currentPage))->render(); ?>
    </div>
</div>

<?php include(__DIR__ . '/../../../views/partials/delete_modal.php'); ?>
<?php include(__DIR__ . '/../../../views/partials/admin_footer.php'); ?>
