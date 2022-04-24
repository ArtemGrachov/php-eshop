<?php
require_once(__DIR__ . '/../../widgets/cart_counter.php');

$widgetCartCounter = new WidgetCartCounter();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP eShop | Admin panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="/public/styles.css">
</head>
<body>

<div class="is-flex is-flex-direction-column min-h-full">
    <div class="has-background-link has-text-white is-flex-grow-0 is-flex-shrink-0	">
        <div class="container p-4 is-flex is-justify-content-space-between is-align-items-center">
            <h1 class="is-size-4">
                PHP E-Commerce Example
            </h1>
            <a href="/cart" class="button is-info">
            <?php $widgetCartCounter->render(); ?>
            </a>
        </div>
    </div>
