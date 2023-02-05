<?php include(__DIR__ . '/../../views/partials/admin_header.php'); ?>

<div class="container">
    <div class="mb-4">
        <a href="/admin/taxons">
            <?= ServiceI18n::t('admin.dashboard.link_taxons') ?>
        </a>
    </div>
    <div class="mb-4">
        <a href="/admin/products">
            <?= ServiceI18n::t('admin.dashboard.link_products') ?>
        </a>
    </div>
    <div class="mb-4">
        <a href="/admin/orders">
            <?= ServiceI18n::t('admin.dashboard.link_orders') ?>
        </a>
    </div>
    <div class="mb-4">
        <a href="/admin/addresses">
            <?= ServiceI18n::t('admin.dashboard.link_addresses') ?>
        </a>
    </div>
    <div class="mb-4">
        <a href="/admin/users">
            <?= ServiceI18n::t('admin.dashboard.link_users') ?>
        </a>
    </div>
</div>

<?php include(__DIR__ . '/../../views/partials/admin_footer.php'); ?>
