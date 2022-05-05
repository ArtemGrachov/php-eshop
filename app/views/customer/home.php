<?php include(__DIR__ . '/../../views/partials/header.php'); ?>

<div class="container py-5 px-4">
    <div class="columns is-desktop">
        <div class="column is-2-desktop">
            <?php foreach ($taxons as $taxon): ?>
                <div>
                    <a href="/taxon?id=<?= $taxon->id ?>">
                        <?= $taxon->name ?> (<?= $taxon->productsCount ?>)
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="column is-10-desktop">
            <div class="columns is-mobile is-multiline">
                <?php foreach ($products as $product): ?>
                    <div class="column is-6-mobile is-4-tablet is-3-desktop">
                        <?php include(__DIR__ . '../../partials/product_card.php'); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?php include(__DIR__ . '/../../views/partials/footer.php'); ?>
