<?php if (isset($breadcrumbs)): ?>
    <div class="has-text-grey">
        <?php foreach ($breadcrumbs as $index => $breadcrumb): ?>
            <?php if ($index !== 0): ?>
                <span class="mx-2">
                    >
                </span>
            <?php endif ?>
            <?php if (isset($breadcrumb['link'])): ?>
                <a href="<?= $breadcrumb['link'] ?>">
                    <?= $breadcrumb['label'] ?>
                </a>
            <?php else: ?>
                <?= $breadcrumb['label'] ?>
            <?php endif ?>
        <?php endforeach?>
    </div>
<?php endif ?>
