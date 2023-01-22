<?php
    require_once(__DIR__ . '/../../../widgets/form_error.php');
?>

<?php include(__DIR__ . '/../../../views/partials/admin_header.php'); ?>

<div class="container">
    <div class="mb-4">
        <a href="/admin/taxons">
            Return to taxon list
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
                        Name
                    </label>
                    <div class="control">
                        <input
                            class="input"
                            type="text"
                            name="name"
                            placeholder="Name"
                            value="<?= $formValue['name'] ?>"
                        />
                    </div>
                    <?php (new WidgetFormError($formErrors['name'] ?? []))->render(); ?>
                </div>
                <div class="field">
                    <label class="label">Description</label>
                    <div class="control">
                        <textarea
                            class="textarea"
                            name="description"
                            id="description"
                            cols="30"
                            rows="10"
                            placeholder="Description"
                        ><?= $formValue['description'] ?></textarea>
                    </div>
                    <?php (new WidgetFormError($formErrors['description'] ?? []))->render(); ?>
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
