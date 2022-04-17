<?php include(__DIR__ . '/../../../views/partials/admin_header.php'); ?>

<div class="container">
    <div class="mb-4">
        <a href="/admin">
            Return to dashboard
        </a>
    </div>
    <table class="table is-fullwidth mb-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Stock</th>
                <th>Taxon name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $index => $product): ?>
                <?php include(__DIR__ . '/../../partials/product_list_row.php'); ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="buttons">
        <a
            href="/admin/products/create"
            class="button is-link"
        >
            Create product
        </a>
    </div>
</div>

<?php include(__DIR__ . '/../../../views/partials/admin_footer.php'); ?>
