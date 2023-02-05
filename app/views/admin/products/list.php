<?php
    require_once(__DIR__ . '/../../../widgets/pagination.php');
    include(__DIR__ . '/../../../views/partials/admin_header.php');
?>

<div class="container">
    <div class="mb-4 is-flex is-justify-content-space-between is-align-content-center">
        <a href="/admin">
            <?= ServiceI18n::t('admin.view_products_list.return') ?>
        </a>
        <div class="buttons">
            <a
                href="/admin/products/create"
                class="button is-link"
            >
                <?= ServiceI18n::t('admin.view_products_list.create_product') ?>
            </a>
        </div>
    </div>
    <table class="table is-fullwidth mb-4">
        <thead>
            <tr>
                <th><?= ServiceI18n::t('admin.view_products_list.id') ?></th>
                <th><?= ServiceI18n::t('admin.view_products_list.name') ?></th>
                <th><?= ServiceI18n::t('admin.view_products_list.price') ?></th>
                <th><?= ServiceI18n::t('admin.view_products_list.description') ?></th>
                <th><?= ServiceI18n::t('admin.view_products_list.stock') ?></th>
                <th><?= ServiceI18n::t('admin.view_products_list.taxon_name') ?></th>
                <th><?= ServiceI18n::t('admin.view_products_list.actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $index => $product): ?>
                <?php include(__DIR__ . '/../../partials/product_list_row.php'); ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="py-6">
        <?php (new WidgetPagination($productsTotal, $currentPage))->render(); ?>
    </div>
</div>

<?php include(__DIR__ . '/../../../views/partials/delete_modal.php'); ?>
<?php include(__DIR__ . '/../../../views/partials/admin_footer.php'); ?>
