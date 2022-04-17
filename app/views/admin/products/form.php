<?php
    if (isset($product)) {
        $productName = $product->name;
        $productPrice = $product->price;
        $productDescription = $product->description;
        $productStock = $product->stock;
        $productTracking = $product->tracking;
        $productTaxonId = $product->taxonId;
    } else {
        $productName = '';
        $productPrice = 0;
        $productDescription = '';
        $productStock = 0;
        $productTracking = false;
        $productTaxonId = null;
    }
?>

<?php include(__DIR__ . '/../../../views/partials/admin_header.php'); ?>

<div class="container">
    <div class="mb-4">
        <a href="/admin/products">
            Return to product list
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
                            value="<?= $productName ?>"
                        />
                    </div>
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
                        ><?= $productDescription ?></textarea>
                    </div>
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
                            required
                            step="0.01"
                            value="<?= $productPrice ?>"
                        />
                    </div>
                </div>
                <div class="field">
                    <label class="checkbox">
                        <input type="checkbox" name="tracking">
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
                            required
                            value="<?= $productStock ?>"
                        />
                    </div>
                </div>
                <div class="field">
                    <label for="taxonId" class="label">
                        Taxon
                    </label>
                    <div class="select">
                        <?php
                            $taxonSelectValue = $productTaxonId;
                            include(__DIR__ . '/../../partials/taxon_select.php')
                        ?>
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
