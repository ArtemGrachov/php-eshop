<?php
    if (isset($user)) {
        $username = $user->username;
        $userEmail = $user->email;
    } else {
        $username = '';
        $userEmail = '';
    }
?>

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
                            required
                            value="<?= $username ?>"
                        />
                    </div>
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
                            required
                            value="<?= $userEmail ?>"
                        />
                    </div>
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
                            <?php if (!isset($user)): ?>
                                required
                            <?php endif ?>
                        />
                    </div>
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
