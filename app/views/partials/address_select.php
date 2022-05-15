<select name="addressId" required>
    <option value="">
        Please, select
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