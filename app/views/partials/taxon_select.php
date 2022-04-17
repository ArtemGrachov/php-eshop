<select name="taxonId" required>
    <option value="">
        Please, select
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