<?php include(__DIR__ . '/../../../views/partials/admin_header.php'); ?>

<div class="container">
    <div class="mb-4">
        <a href="/admin" class="has-text-link">
            Return to dashboard
        </a>
    </div>
    <table class="table is-fullwidth mb-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Products count</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($taxons as $index => $taxon): ?>
                <?php include(__DIR__ . '/../../partials/taxon_list_row.php'); ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="buttons">
        <a
            href="/admin/taxons/create"
            class="button is-link"
        >
            Create taxon
        </a>
    </div>
</div>

<?php include(__DIR__ . '/../../../views/partials/admin_footer.php'); ?>
