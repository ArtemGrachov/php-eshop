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
                <th>Email</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $index => $user): ?>
                <?php include(__DIR__ . '/../../partials/user_list_row.php'); ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="buttons">
        <a
            href="/admin/users/create"
            class="button is-link"
        >
            Create user
        </a>
    </div>
</div>

<?php include(__DIR__ . '/../../../views/partials/admin_footer.php'); ?>
