<?php require_once(__DIR__ . '/../../widgets/form_error.php'); ?>
<div class="has-background-white-bis p-4">
    <h2 class="is-size-5 mb-4">
        Customer address
    </h2>
    <div class="field">
        <label
            for="country"
            class="label"
        >
            Country *
        </label>
        <div class="control">
            <input
                class="input<?= isset($formErrors['country']) ? ' is-danger' : '' ?>"
                name="country"
                type="text"
                placeholder="Country"
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
            Region
        </label>
        <div class="control">
            <input
                class="input<?= isset($formErrors['region']) ? ' is-danger' : '' ?>"
                name="region"
                type="text"
                placeholder="Region"
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
            City *
        </label>
        <div class="control">
            <input
                class="input<?= isset($formErrors['city']) ? ' is-danger' : '' ?>"
                name="city"
                type="text"
                placeholder="City"
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
            Street *
        </label>
        <div class="control">
            <input
                class="input<?= isset($formErrors['street']) ? ' is-danger' : '' ?>"
                name="street"
                type="text"
                placeholder="Street"
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
            House number *
        </label>
        <div class="control">
            <input
                class="input<?= isset($formErrors['houseNumber']) ? ' is-danger' : '' ?>"
                name="houseNumber"
                type="text"
                placeholder="House number"
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
            Appartment number
        </label>
        <div class="control">
            <input
                class="input<?= isset($formErrors['appartmentNumber']) ? ' is-danger' : '' ?>"
                name="appartmentNumber"
                type="text"
                placeholder="Appartment number"
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
            Notes
        </label>
        <div class="control">
            <textarea
                name="notes"
                class="textarea<?= isset($formErrors['notes']) ? ' is-danger' : '' ?>"
                placeholder="Notes"
                rows="5"
            ><?= $formValue['notes'] ?? '' ?></textarea>
        </div>
        <?php (new WidgetFormError($formErrors['notes'] ?? []))->render(); ?>
    </div>
</div>
