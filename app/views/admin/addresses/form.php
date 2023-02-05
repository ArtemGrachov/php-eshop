<?php
    require_once(__DIR__ . '/../../../widgets/form_error.php');
    global $ORDER_STATUSES;
?>

<?php include(__DIR__ . '/../../../views/partials/admin_header.php'); ?>

<div class="container">
    <div class="mb-4">
        <a href="/admin/addresses">
            <?= ServiceI18n::t('admin.view_address_form.return') ?>
        </a>
    </div>
    <div class="columns">
        <div class="column is-half">
            <form action="<?= $formAction ?>" method="post">
                <div class="field">
                    <label
                        for="country"
                        class="label"
                    >
                        <?= ServiceI18n::t('admin.view_address_form.label_country') ?>
                    </label>
                    <div class="control">
                        <input
                            id="country"
                            class="input"
                            type="text"
                            name="country"
                            placeholder="<?= ServiceI18n::t('admin.view_address_form.placeholder_country') ?>"
                            value="<?= $formValue['country'] ?>"
                        />
                    </div>
                    <?php (new WidgetFormError($formErrors['country'] ?? []))->render(); ?>
                </div>
                <div class="field">
                    <label
                        for="region"
                        class="label"
                    >
                        <?= ServiceI18n::t('admin.view_address_form.label_region') ?>
                    </label>
                    <div class="control">
                        <input
                            id="region"
                            class="input"
                            type="text"
                            name="region"
                            placeholder="<?= ServiceI18n::t('admin.view_address_form.placeholder_region') ?>"
                            value="<?= $formValue['region'] ?>"
                        />
                    </div>
                    <?php (new WidgetFormError($formErrors['region'] ?? []))->render(); ?>
                </div>
                <div class="field">
                    <label
                        for="city"
                        class="label"
                    >
                        <?= ServiceI18n::t('admin.view_address_form.label_city') ?>
                    </label>
                    <div class="control">
                        <input
                            id="city"
                            class="input"
                            type="text"
                            name="city"
                            placeholder="<?= ServiceI18n::t('admin.view_address_form.placeholder_city') ?>"
                            value="<?= $formValue['city'] ?>"
                        />
                    </div>
                    <?php (new WidgetFormError($formErrors['city'] ?? []))->render(); ?>
                </div>
                <div class="field">
                    <label
                        for="street"
                        class="label"
                    >
                        <?= ServiceI18n::t('admin.view_address_form.label_street') ?>
                    </label>
                    <div class="control">
                        <input
                            id="street"
                            class="input"
                            type="text"
                            name="street"
                            placeholder="<?= ServiceI18n::t('admin.view_address_form.placeholder_street') ?>"
                            value="<?= $formValue['street'] ?>"
                        />
                    </div>
                    <?php (new WidgetFormError($formErrors['street'] ?? []))->render(); ?>
                </div>
                <div class="field">
                    <label
                        for="houseNumber"
                        class="label"
                    >
                        <?= ServiceI18n::t('admin.view_address_form.label_house_number') ?>
                    </label>
                    <div class="control">
                        <input
                            id="houseNumber"
                            class="input"
                            type="text"
                            name="houseNumber"
                            placeholder="<?= ServiceI18n::t('admin.view_address_form.placeholder_house_number') ?>"
                            value="<?= $formValue['houseNumber'] ?>"
                        />
                    </div>
                    <?php (new WidgetFormError($formErrors['houseNumber'] ?? []))->render(); ?>
                </div>
                <div class="field">
                    <label
                        for="appartmentNumber"
                        class="label"
                    >
                        <?= ServiceI18n::t('admin.view_address_form.label_appartment_number') ?>
                    </label>
                    <div class="control">
                        <input
                            id="appartmentNumber"
                            class="input"
                            type="text"
                            name="appartmentNumber"
                            placeholder="<?= ServiceI18n::t('admin.view_address_form.placeholder_appartment_number') ?>"
                            value="<?= $formValue['appartmentNumber'] ?>"
                        />
                    </div>
                    <?php (new WidgetFormError($formErrors['appartmentNumber'] ?? []))->render(); ?>
                </div>
                <div class="field">
                    <label class="label">
                        <?= ServiceI18n::t('admin.view_address_form.label_notes') ?>
                    </label>
                    <div class="control">
                        <textarea
                            class="textarea"
                            name="notes"
                            id="notes"
                            cols="30"
                            rows="10"
                            placeholder="<?= ServiceI18n::t('admin.view_address_form.placeholder_notes') ?>"
                        ><?= $formValue['notes'] ?></textarea>
                    </div>
                    <?php (new WidgetFormError($formErrors['notes'] ?? []))->render(); ?>
                </div>
                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link">
                            <?= ServiceI18n::t('admin.view_address_form.label_submit') ?>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include(__DIR__ . '/../../../views/partials/admin_footer.php'); ?>
