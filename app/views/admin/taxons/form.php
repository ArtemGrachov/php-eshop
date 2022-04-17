<?php
    if (isset($taxon)) {
        $taxonName = $taxon->name;
        $taxonDescription = $taxon->description;
    } else {
        $taxonName = '';
        $taxonDescription = '';
    }
?>

<?php include(__DIR__ . '/../../../views/partials/admin_header.php'); ?>

<div class="container">
    <div class="mb-4">
        <a href="/admin/taxons" class="has-text-link">
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
                            required
                            value="<?= $taxonName ?>"
                        />
                    </div>
                </div>
                <div class="field">
                    <label class="label">Message</label>
                    <div class="control">
                        <textarea
                            class="textarea"
                            name="description"
                            id="description"
                            cols="30"
                            rows="10"
                            placeholder="Description"
                        ><?= $taxonDescription ?></textarea>
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
