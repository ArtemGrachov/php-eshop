<select name="addressId">
    <option value="">
        <?= ServiceI18n::t('common.select_placeholder') ?>
    </option>
    <?php foreach ($addresses as $address): ?>
        <option
            value="<?= $address->id ?>"
            <?= $addressSelectValue === $address->id ? 'selected' : ''?>
        >
            <?= $address->textShort ?>
        </option>
    <?php endforeach; ?>
</select>