<?php require_once(__DIR__ . '/../../widgets/form_error.php'); ?>

<?php include(__DIR__ . '/../../views/partials/admin_header.php'); ?>

<div class="container">
    <div class="columns">
        <div class="column is-half">
            <form action="<?= $formAction ?>" method="post" enctype="multipart/form-data">
                <div class="field">
                    <label
                        for="name"
                        class="label"
                    >
                        <?= ServiceI18n::t('admin.auth.label_username') ?>
                    </label>
                    <div class="control">
                        <input
                            class="input"
                            type="text"
                            name="username"
                            placeholder="<?= ServiceI18n::t('admin.auth.placeholder_username') ?>"
                            required
                        />
                    </div>
                    <?php (new WidgetFormError($formErrors['username'] ?? []))->render(); ?>
                </div>
                <div class="field">
                    <label
                        for="name"
                        class="label"
                    >
                        <?= ServiceI18n::t('admin.auth.label_password') ?>
                    </label>
                    <div class="control">
                        <input
                            class="input"
                            type="password"
                            name="password"
                            placeholder="<?= ServiceI18n::t('admin.auth.placeholder_password') ?>"
                            required
                        />
                    </div>
                    <?php (new WidgetFormError($formErrors['password'] ?? []))->render(); ?>
                </div>
                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link">
                            <?= ServiceI18n::t('admin.auth.label_submit') ?>
                        </button>
                    </div>
                </div>
                <?php if ($formError): ?>
                    <p class="help is-danger">
                        <?= $formError ?>
                    </p>
                <?php endif ?>
            </form>
        </div>
    </div>
</div>

<?php include(__DIR__ . '/../../views/partials/admin_footer.php'); ?>
