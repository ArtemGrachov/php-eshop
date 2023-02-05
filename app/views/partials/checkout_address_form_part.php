<?php require_once(__DIR__ . '/../../widgets/form_error.php'); ?>
<div class="has-background-white-bis p-4">
    <h2 class="is-size-5 mb-4">
        <?= ServiceI18n::t('partials.checkout_address_form_part.title') ?>
    </h2>
    <div class="field">
        <label
            for="country"
            class="label"
        >
            <?= ServiceI18n::t('partials.checkout_address_form_part.label_country') ?>*
        </label>
        <div class="control">
            <input
                class="input<?= isset($formErrors['country']) ? ' is-danger' : '' ?>"
                name="country"
                type="text"
                placeholder="<?= ServiceI18n::t('partials.checkout_address_form_part.placeholder_country') ?>"
                value="<?= $formValue['country'] ?? '' ?>"
            />
        </div>
        <?php (new WidgetFormError($formErrors['country'] ?? []))->render(); ?>
    </div>
    <div class="field">
        <label
            for="region"
            class="label"
        >
            <?= ServiceI18n::t('partials.checkout_address_form_part.label_region') ?>
        </label>
        <div class="control">
            <input
                class="input<?= isset($formErrors['region']) ? ' is-danger' : '' ?>"
                name="region"
                type="text"
                placeholder="<?= ServiceI18n::t('partials.checkout_address_form_part.placeholder_region') ?>"
                value="<?= $formValue['region'] ?? '' ?>"
            />
        </div>
        <?php (new WidgetFormError($formErrors['region'] ?? []))->render(); ?>
    </div>
    <div class="field">
        <label
            for="city"
            class="label"
        >
            <?= ServiceI18n::t('partials.checkout_address_form_part.label_city') ?>*
        </label>
        <div class="control">
            <input
                class="input<?= isset($formErrors['city']) ? ' is-danger' : '' ?>"
                name="city"
                type="text"
                placeholder="<?= ServiceI18n::t('partials.checkout_address_form_part.placeholder_city') ?>"
                value="<?= $formValue['city'] ?? '' ?>"
            />
        </div>
        <?php (new WidgetFormError($formErrors['city'] ?? []))->render(); ?>
    </div>
    <div class="field">
        <label
            for="street"
            class="label"
        >
            <?= ServiceI18n::t('partials.checkout_address_form_part.label_street') ?>*
        </label>
        <div class="control">
            <input
                class="input<?= isset($formErrors['street']) ? ' is-danger' : '' ?>"
                name="street"
                type="text"
                placeholder="<?= ServiceI18n::t('partials.checkout_address_form_part.placeholder_street') ?>"
                value="<?= $formValue['street'] ?? '' ?>"
            >
        </div>
        <?php (new WidgetFormError($formErrors['street'] ?? []))->render(); ?>
    </div>
    <div class="field">
        <label
            for="houseNumber"
            class="label"
        >
            <?= ServiceI18n::t('partials.checkout_address_form_part.label_house_number') ?>*
        </label>
        <div class="control">
            <input
                class="input<?= isset($formErrors['houseNumber']) ? ' is-danger' : '' ?>"
                name="houseNumber"
                type="text"
                placeholder="<?= ServiceI18n::t('partials.checkout_address_form_part.placeholder_house_number') ?>"
                value="<?= $formValue['houseNumber'] ?? '' ?>"
            />
        </div>
        <?php (new WidgetFormError($formErrors['houseNumber'] ?? []))->render(); ?>
    </div>
    <div class="field">
        <label
            for="appartmentNumber"
            class="label"
        >
            <?= ServiceI18n::t('partials.checkout_address_form_part.label_appartment_number') ?>
        </label>
        <div class="control">
            <input
                class="input<?= isset($formErrors['appartmentNumber']) ? ' is-danger' : '' ?>"
                name="appartmentNumber"
                type="text"
                placeholder="<?= ServiceI18n::t('partials.checkout_address_form_part.placeholder_appartment_number') ?>"
                value="<?= $formValue['appartmentNumber'] ?? '' ?>"
            />
        </div>
        <?php (new WidgetFormError($formErrors['appartmentNumber'] ?? []))->render(); ?>
    </div>
    <div class="field">
        <label
            for="notes"
            class="label"
        >
            <?= ServiceI18n::t('partials.checkout_address_form_part.label_notes') ?>
        </label>
        <div class="control">
            <textarea
                name="notes"
                class="textarea<?= isset($formErrors['notes']) ? ' is-danger' : '' ?>"
                placeholder="<?= ServiceI18n::t('partials.checkout_address_form_part.placeholder_notes') ?>"
                rows="5"
            ><?= $formValue['notes'] ?? '' ?></textarea>
        </div>
        <?php (new WidgetFormError($formErrors['notes'] ?? []))->render(); ?>
    </div>
</div>
