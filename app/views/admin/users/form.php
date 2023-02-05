<?php require_once(__DIR__ . '/../../../widgets/form_error.php'); ?>

<?php include(__DIR__ . '/../../../views/partials/admin_header.php'); ?>

<div class="container">
    <div class="mb-4">
        <a href="/admin/users">
            <?= ServiceI18n::t('admin.view_users_form.return') ?>
        </a>
    </div>

    <div class="columns">
        <div class="column is-half">
            <form action="<?= $formAction ?>" method="post">
                <div class="field">
                    <label
                        for="name"
                        class="label"
                    >
                        <?= ServiceI18n::t('admin.view_users_form.label_username') ?>
                    </label>
                    <div class="control">
                        <input
                            class="input"
                            type="text"
                            name="username"
                            placeholder="<?= ServiceI18n::t('admin.view_users_form.placeholder_username') ?>"
                            value="<?= $formValue['username'] ?>"
                        />
                    </div>
                    <?php (new WidgetFormError($formErrors['username'] ?? []))->render(); ?>
                </div>
                <div class="field">
                    <label
                        for="name"
                        class="label"
                    >
                        <?= ServiceI18n::t('admin.view_users_form.label_email') ?>
                    </label>
                    <div class="control">
                        <input
                            class="input"
                            type="email"
                            name="email"
                            placeholder="<?= ServiceI18n::t('admin.view_users_form.placeholder_email') ?>"
                            value="<?= $formValue['email'] ?>"
                        />
                    </div>
                    <?php (new WidgetFormError($formErrors['email'] ?? []))->render(); ?>
                </div>
                <div class="field">
                    <label
                        for="name"
                        class="label"
                    >
                        <?= ServiceI18n::t('admin.view_users_form.label_password') ?>
                    </label>
                    <div class="control">
                        <input
                            class="input"
                            type="password"
                            name="password"
                            placeholder="<?= ServiceI18n::t('admin.view_users_form.placeholder_password') ?>"
                        />
                    </div>
                    <?php (new WidgetFormError($formErrors['password'] ?? []))->render(); ?>
                </div>
                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link">
                            <?= ServiceI18n::t('admin.view_users_form.label_submit') ?>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include(__DIR__ . '/../../../views/partials/admin_footer.php'); ?>
