<select name="state">
    <option value="">
        <?= ServiceI18n::t('common.select_placeholder') ?>
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
