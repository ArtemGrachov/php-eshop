<select name="state">
    <option value="">
        Please, select
    </option>
    <?php foreach ($orderStates as $state): ?>
        <option
            value="<?= $state['value'] ?>"
            <?= $stateSelectedValue === $state['value'] ? 'selected' : ''?>
        >
            <?= $state['label'] ?>
        </option>
    <?php endforeach; ?>
</select>
