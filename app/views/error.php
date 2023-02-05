<?php include(__DIR__ . '/partials/header.php'); ?>

<div class="is-flex is-flex-direction-column is-flex-grow-1 is-flex-shrink-1 pa-5">
    <div class="m-auto has-text-centered">
        <h1 class="title">
          <?= $errorTitle ?>
        </h1>
        <p class="subtitle">
          <?= $errorDescription ?>
        </p>
    </div>
</div>

<?php include(__DIR__ . '/partials/footer.php'); ?>
