<select name="taxonId">
    <option value="">
        <?= ServiceI18n::t('common.select_placeholder') ?>
    </option>
    <?php foreach ($taxons as $taxon): ?>
        <option
            value="<?= $taxon->id ?>"
            <?= $taxonSelectValue === $taxon->id ? 'selected' : ''?>
        >
            <?= $taxon->name ?>
        </option>
    <?php endforeach; ?>
</select>