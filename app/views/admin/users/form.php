<?php require_once(__DIR__ . '/../../../widgets/form_error.php'); ?>

<?php include(__DIR__ . '/../../../views/partials/admin_header.php'); ?>

<div class="container">
    <div class="mb-4">
        <a href="/admin/users">
            Return to user list
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
                        Username
                    </label>
                    <div class="control">
                        <input
                            class="input"
                            type="text"
                            name="username"
                            placeholder="Name"
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
                        Email
                    </label>
                    <div class="control">
                        <input
                            class="input"
                            type="email"
                            name="email"
                            placeholder="Email"
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
                        Password
                    </label>
                    <div class="control">
                        <input
                            class="input"
                            type="password"
                            name="password"
                            placeholder="Password"
                        />
                    </div>
                    <?php (new WidgetFormError($formErrors['password'] ?? []))->render(); ?>
                </div>
                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include(__DIR__ . '/../../../views/partials/admin_footer.php'); ?>
