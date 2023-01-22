<?php
require_once(__DIR__ . '/../../models/user.php');

$auth = ServiceAuth::getInstance();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP eShop | Admin panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="/public/styles.css">
</head>
<body>

<div class="has-background-light mb-5">
    <div class="container py-4 is-flex is-align-items-center is-justify-content-space-between">
        <h1 class="is-size-4 mr-auto">
            <?= $title ?>
        </h1>
        <a
            href="/"
            class="mr-4"
        >
            Go to the shop
        </a>
        <?php if ($auth->isAuthenticated()): ?>
            <a href="/admin/sign-out">
                Logout
            </a>
        <?php endif; ?>
    </div>
</div>
