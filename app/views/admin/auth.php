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
                        Username
                    </label>
                    <div class="control">
                        <input
                            class="input"
                            type="text"
                            name="username"
                            placeholder="Name"
                            required
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
                            required
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

<?php include(__DIR__ . '/../../views/partials/admin_footer.php'); ?>
