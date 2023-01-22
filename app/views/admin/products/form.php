<?php require_once(__DIR__ . '/../../../widgets/form_error.php'); ?>

<?php include(__DIR__ . '/../../../views/partials/admin_header.php'); ?>

<div class="container">
    <div class="mb-4">
        <a href="/admin/products">
            Return to product list
        </a>
    </div>

    <div class="columns">
        <div class="column is-half">
            <form action="<?= $formAction ?>" method="post" enctype="multipart/form-data">
                <div class="field">
                    <label
                        for="image"
                        class="label"
                    >
                        Image
                    </label>
                    <div class="file is-boxed">
                      <label class="file-label">
                        <input class="file-input" type="file" name="image">
                        <span class="file-cta">
                          <span class="file-icon">
                            <i class="fas fa-upload"></i>
                          </span>
                          <span class="file-label">
                            Choose a file…
                          </span>
                        </span>
                      </label>
                    </div>
                    <?php (new WidgetFormError($formErrors['image'] ?? []))->render(); ?>
                </div>
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
                <div class="field">
                    <label
                        for="price"
                        class="label"
                    >
                        Price
                    </label>
                    <div class="control">
                        <input
                            class="input"
                            type="number"
                            name="price"
                            placeholder="Price"
                            step="0.01"
                            value="<?= $formValue['price'] ?>"
                        />
                    </div>
                    <?php (new WidgetFormError($formErrors['price'] ?? []))->render(); ?>
                </div>
                <div class="field">
                    <label class="checkbox">
                        <input
                            type="checkbox"
                            name="tracking"
                            <?= ($formValue['tracking'] ?? false) ? 'checked' : '' ?>
                        >
                        Tracked
                    </label>
                </div>
                <div class="field">
                    <label
                        for="stock"
                        class="label"
                    >
                        Stock
                    </label>
                    <div class="control">
                        <input
                            class="input"
                            type="number"
                            name="stock"
                            placeholder="Stock"
                            value="<?= $formValue['stock'] ?>"
                        />
                    </div>
                    <?php (new WidgetFormError($formErrors['stock'] ?? []))->render(); ?>
                </div>
                <div class="field">
                    <label for="taxonId" class="label">
                        Taxon
                    </label>
                    <div class="select">
                        <?php
                            $taxonSelectValue = $formValue['taxonId'];
                            include(__DIR__ . '/../../partials/taxon_select.php')
                        ?>
                    </div>
                    <?php (new WidgetFormError($formErrors['taxonId'] ?? []))->render(); ?>
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
