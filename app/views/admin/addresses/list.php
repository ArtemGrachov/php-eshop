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
                <th>Country</th>
                <th>Region</th>
                <th>City</th>
                <th>Street</th>
                <th>House number</th>
                <th>Appartment number</th>
                <th>Notes</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($addresses as $index => $address): ?>
                <?php include(__DIR__ . '/../../partials/address_list_row.php'); ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="buttons">
        <a
            href="/admin/addresses/create"
            class="button is-link"
        >
            Create address
        </a>
    </div>
</div>

<?php include(__DIR__ . '/../../../views/partials/admin_footer.php'); ?>
