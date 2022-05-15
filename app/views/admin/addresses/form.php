<?php
    global $ORDER_STATUSES;

    if (isset($address)) {
        $addressCountry = $address->country;
        $addressRegion = $address->region;
        $addressCity = $address->city;
        $addressStreet = $address->street;
        $addressHouseNumber = $address->houseNumber;
        $addressAppartmentNumber = $address->appartmentNumber;
        $addressNotes = $address->notes;
    } else {
        $addressCountry = '';
        $addressRegion = '';
        $addressCity = '';
        $addressStreet = '';
        $addressHouseNumber = '';
        $addressAppartmentNumber = '';
        $addressNotes = '';
    }
?>

<?php include(__DIR__ . '/../../../views/partials/admin_header.php'); ?>

<div class="container">
    <div class="mb-4">
        <a href="/admin/addresses">
            Return to adresses list
        </a>
    </div>

    <div class="columns">
        <div class="column is-half">
            <form action="<?= $formAction ?>" method="post">
                <div class="field">
                    <label
                        for="country"
                        class="label"
                    >
                        Country
                    </label>
                    <div class="control">
                        <input
                            id="country"
                            class="input"
                            type="text"
                            name="country"
                            placeholder="Country"
                            required
                            value="<?= $addressCountry ?>"
                        />
                    </div>
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
                            id="region"
                            class="input"
                            type="text"
                            name="region"
                            placeholder="Region"
                            required
                            value="<?= $addressRegion ?>"
                        />
                    </div>
                </div>
                <div class="field">
                    <label
                        for="city"
                        class="label"
                    >
                        City
                    </label>
                    <div class="control">
                        <input
                            id="city"
                            class="input"
                            type="text"
                            name="city"
                            placeholder="City"
                            required
                            value="<?= $addressCity ?>"
                        />
                    </div>
                </div>
                <div class="field">
                    <label
                        for="street"
                        class="label"
                    >
                        Street
                    </label>
                    <div class="control">
                        <input
                            id="street"
                            class="input"
                            type="text"
                            name="street"
                            placeholder="Street"
                            required
                            value="<?= $addressStreet ?>"
                        />
                    </div>
                </div>
                <div class="field">
                    <label
                        for="houseNumber"
                        class="label"
                    >
                        House number
                    </label>
                    <div class="control">
                        <input
                            id="houseNumber"
                            class="input"
                            type="text"
                            name="houseNumber"
                            placeholder="House number"
                            required
                            value="<?= $addressHouseNumber ?>"
                        />
                    </div>
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
                            id="appartmentNumber"
                            class="input"
                            type="text"
                            name="appartmentNumber"
                            placeholder="Appartment number"
                            required
                            value="<?= $addressAppartmentNumber ?>"
                        />
                    </div>
                </div>
                <div class="field">
                    <label class="label">Notes</label>
                    <div class="control">
                        <textarea
                            class="textarea"
                            name="notes"
                            id="notes"
                            cols="30"
                            rows="10"
                            placeholder="Notes"
                        ><?= $addressNotes ?></textarea>
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
