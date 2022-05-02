<?php require_once(__DIR__ . '/../../widgets/form_error.php'); ?>
<div class="has-background-white-bis p-4">
    <h2 class="is-size-5 mb-4">
        Customer information
    </h2>
    <div class="field">
        <label
            for="firstName"
            class="label"
        >
            First name *
        </label>
        <div class="control">
            <input
                class="input<?= isset($formErrors['firstName']) ? ' is-danger' : '' ?>"
                name="firstName"
                type="text"
                placeholder="First name"
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
            Last name *
        </label>
        <div class="control">
            <input
                class="input<?= isset($formErrors['lastName']) ? ' is-danger' : '' ?>"
                name="lastName"
                type="text"
                placeholder="Last name"
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
            Email *
        </label>
        <div class="control">
            <input
                class="input<?= isset($formErrors['email']) ? ' is-danger' : '' ?>"
                name="email"
                type="email"
                placeholder="Email"
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
            Phone number *
        </label>
        <div class="control">
            <input
                class="input<?= isset($formErrors['phoneNumber']) ? ' is-danger' : '' ?>"
                name="phoneNumber"
                type="text"
                placeholder="Phone number"
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
                Is company
            </label>
        </div>
    </div>
    <div class="field">
        <label
            for="companyName"
            class="label"
        >
            Company name
        </label>
        <div
            class="control"
        >
            <input
                class="input<?= isset($formErrors['companyName']) ? ' is-danger' : '' ?>"
                name="companyName"
                type="text"
                placeholder="Company name"
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
            Company VAT number
        </label>
        <div class="control">
            <input
                class="input<?= isset($formErrors['companyVatNumber']) ? ' is-danger' : '' ?>"
                name="companyVatNumber"
                type="text"
                placeholder="Company VAT number"
                value="<?= $formValue['companyVatNumber'] ?? '' ?>"
            />
        </div>
        <?php (new WidgetFormError($formErrors['companyVatNumber'] ?? []))->render(); ?>
    </div>
</div>
