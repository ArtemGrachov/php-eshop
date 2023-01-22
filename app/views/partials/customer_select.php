<select name="customerId">
    <option value="">
        Please, select
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
