<?php include(__DIR__ . '/partials/header.php'); ?>

<div class="is-flex-grow-0 is-flex-shrink-0">
    <div class="container py-5 px-4">
        <?php include(__DIR__ . '/partials/breadcrumbs.php'); ?>
    </div>
</div>
<div class="m-auto has-text-centered pa-5 m-auto">
    <h1 class="title">
        <?= $errorTitle ?>
    </h1>
    <p class="subtitle">
        <?= $errorDescription ?>
    </p>
</div>

<?php include(__DIR__ . '/partials/footer.php'); ?>
