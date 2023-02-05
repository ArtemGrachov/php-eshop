<?php require_once(__DIR__ . '/../../widgets/form_error.php'); ?>
<div class="has-background-white-bis p-4">
    <h2 class="is-size-5 mb-4">
        <?= ServiceI18n::t('partials.checkout_customer_form_part.title') ?>
    </h2>
    <div class="field">
        <label
            for="firstName"
            class="label"
        >
            <?= ServiceI18n::t('partials.checkout_customer_form_part.label_first_name') ?>*
        </label>
        <div class="control">
            <input
                class="input<?= isset($formErrors['firstName']) ? ' is-danger' : '' ?>"
                name="firstName"
                type="text"
                placeholder="<?= ServiceI18n::t('partials.checkout_customer_form_part.placeholder_first_name') ?>"
                value="<?= $formValue['firstName'] ?? '' ?>"
            />
        </div>
        <?php (new WidgetFormError($formErrors['firstName'] ?? []))->render(); ?>
    </div>
    <div class="field">
        <label
            for="lastName"
            class="label"
        >
            <?= ServiceI18n::t('partials.checkout_customer_form_part.label_last_name') ?>*
        </label>
        <div class="control">
            <input
                class="input<?= isset($formErrors['lastName']) ? ' is-danger' : '' ?>"
                name="lastName"
                type="text"
                placeholder="<?= ServiceI18n::t('partials.checkout_customer_form_part.placeholder_last_name') ?>"
                value="<?= $formValue['lastName'] ?? '' ?>"
            />
        </div>
        <?php (new WidgetFormError($formErrors['lastName'] ?? []))->render(); ?>
    </div>
    <div class="field">
        <label
            for="email"
            class="label"
        >
            <?= ServiceI18n::t('partials.checkout_customer_form_part.label_email') ?>*
        </label>
        <div class="control">
            <input
                class="input<?= isset($formErrors['email']) ? ' is-danger' : '' ?>"
                name="email"
                type="email"
                placeholder="<?= ServiceI18n::t('partials.checkout_customer_form_part.placeholder_email') ?>"
                value="<?= $formValue['email'] ?? '' ?>"
            />
        </div>
        <?php (new WidgetFormError($formErrors['email'] ?? []))->render(); ?>
    </div>
    <div class="field">
        <label
            for="phoneNumber"
            class="label"
        >
            <?= ServiceI18n::t('partials.checkout_customer_form_part.label_phone_number') ?>*
        </label>
        <div class="control">
            <input
                class="input<?= isset($formErrors['phoneNumber']) ? ' is-danger' : '' ?>"
                name="phoneNumber"
                type="text"
                placeholder="<?= ServiceI18n::t('partials.checkout_customer_form_part.placeholder_phone_number') ?>"
                value="<?= $formValue['phoneNumber'] ?? '' ?>"
            />
        </div>
        <?php (new WidgetFormError($formErrors['phoneNumber'] ?? []))->render(); ?>
    </div>
    <div class="field">
        <div class="control">
            <label class="checkbox">
                <input
                    type="checkbox"
                    name="isCompany"
                >
                <?= ServiceI18n::t('partials.checkout_customer_form_part.label_is_company') ?>
            </label>
        </div>
    </div>
    <div class="field">
        <label
            for="companyName"
            class="label"
        >
            <?= ServiceI18n::t('partials.checkout_customer_form_part.label_company_name') ?>
        </label>
        <div
            class="control"
        >
            <input
                class="input<?= isset($formErrors['companyName']) ? ' is-danger' : '' ?>"
                name="companyName"
                type="text"
                placeholder="<?= ServiceI18n::t('partials.checkout_customer_form_part.placeholder_company_name') ?>"
                value="<?= $formValue['companyName'] ?? '' ?>"
            />
        </div>
        <?php (new WidgetFormError($formErrors['companyName'] ?? []))->render(); ?>
    </div>
    <div class="field">
        <label
            for="companyVatNumber"
            class="label"
        >
            <?= ServiceI18n::t('partials.checkout_customer_form_part.label_company_vat') ?>
        </label>
        <div class="control">
            <input
                class="input<?= isset($formErrors['companyVatNumber']) ? ' is-danger' : '' ?>"
                name="companyVatNumber"
                type="text"
                placeholder="<?= ServiceI18n::t('partials.checkout_customer_form_part.placeholder_company_vat') ?>"
                value="<?= $formValue['companyVatNumber'] ?? '' ?>"
            />
        </div>
        <?php (new WidgetFormError($formErrors['companyVatNumber'] ?? []))->render(); ?>
    </div>
</div>
