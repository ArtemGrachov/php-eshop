<?php include(__DIR__ . '/../../views/partials/header.php'); ?>

<div class="container py-5 px-4">
    <div class="mb-5">
        <?php include(__DIR__ . '/../partials/breadcrumbs.php'); ?>
    </div>
    <h1 class="is-size-2 mb-4">
        <?= $title ?>
    </h1>
    <div class="columns is-multiline mb-4">
        <?php foreach ($products as $product): ?>
            <div class="column is-3">
                <?php include(__DIR__ . '../../partials/product_card.php'); ?>
            </div>
        <?php endforeach; ?>
    </div>
    <?php if (!is_null($description)): ?>
        <div>
            <?= $description ?>
        </div>
    <?php endif ?>
</div>

<?php include(__DIR__ . '/../../views/partials/footer.php'); ?>
