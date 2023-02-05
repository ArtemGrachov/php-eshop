<?php foreach ($errorMessages as $errorMessage): ?>
    <p class="help is-danger">
        <?= ServiceI18n::t($errorMessage) ?>
    </p>
<?php endforeach ?>
