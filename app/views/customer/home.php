<?php include(__DIR__ . '/../../views/partials/header.php'); ?>

<div class="container py-5 px-4">
    <div class="columns">
        <div class="column is-2">
            <?php foreach ($taxons as $taxon): ?>
                <div>
                    <a href="#">
                        <?= $taxon->name ?> (5)
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="column is-10">
            <div class="columns is-multiline">
                <?php foreach ($products as $product): ?>
                    <div class="column is-3">
                        <?php include(__DIR__ . '../../partials/product_card.php'); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?php include(__DIR__ . '/../../views/partials/footer.php'); ?>
