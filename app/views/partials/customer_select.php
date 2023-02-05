<select name="customerId">
    <option value="">
        <?= ServiceI18n::t('common.select_placeholder') ?>
    </option>
    <?php foreach ($customers as $customer): ?>
        <option
            value="<?= $customer->id ?>"
            <?= $customerSelectValue === $customer->id ? 'selected' : ''?>
        >
            <?= $customer->textShort ?>
        </option>
    <?php endforeach; ?>
</select>
