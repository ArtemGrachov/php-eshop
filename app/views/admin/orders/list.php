<?php
    require_once(__DIR__ . '/../../../widgets/pagination.php');
    include(__DIR__ . '/../../../views/partials/admin_header.php');
?>

<div class="container">
    <div class="mb-4 is-flex is-justify-content-space-between is-align-content-center">
        <a href="/admin">
            <?= ServiceI18n::t('admin.view_orders_list.return') ?>
        </a>
        <div class="buttons">
            <a
                href="/admin/orders/create"
                class="button is-link"
            >
                <?= ServiceI18n::t('admin.view_orders_list.create_order') ?>
            </a>
        </div>
    </div>
    <table class="table is-fullwidth mb-4">
        <thead>
            <tr>
                <th><?= ServiceI18n::t('admin.view_orders_list.id') ?></th>
                <th><?= ServiceI18n::t('admin.view_orders_list.token') ?></th>
                <th><?= ServiceI18n::t('admin.view_orders_list.state') ?></th>
                <th><?= ServiceI18n::t('admin.view_orders_list.customer') ?></th>
                <th><?= ServiceI18n::t('admin.view_orders_list.address') ?></th>
                <th><?= ServiceI18n::t('admin.view_orders_list.note') ?></th>
                <th><?= ServiceI18n::t('admin.view_orders_list.actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $index => $order): ?>
                <?php include(__DIR__ . '/../../partials/order_list_row.php'); ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="py-6">
        <?php (new WidgetPagination($ordersTotal, $currentPage))->render(); ?>
    </div>
</div>

<?php include(__DIR__ . '/../../../views/partials/delete_modal.php'); ?>
<?php include(__DIR__ . '/../../../views/partials/admin_footer.php'); ?>
