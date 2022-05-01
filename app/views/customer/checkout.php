<?php include(__DIR__ . '/../partials/header.php'); ?>

<div class="container py-5 px-4">
    <div class="mb-5">
        <?php include(__DIR__ . '/../partials/breadcrumbs.php'); ?>
    </div>
    <div class="columns">
        <div class="column is-8">
            <form action="/checkout" method="POST">
                <div class="mb-4">
                    <?php include(__DIR__ . '/../partials/checkout_customer_form_part.php'); ?>
                </div>
                <div class="mb-4">
                    <?php include(__DIR__ . '/../partials/checkout_address_form_part.php'); ?>
                </div>
                <button class="button is-success is-large">
                    <span class="icon mr-2">
                        <span class="material-icons">
                            done
                        </span>
                    </span>
                    Submit order
                </button>
            </form>
        </div>
        <div class="column is-4">
            <div class="mb-4">
                <ul class="list-reset">
                    <?php
                        foreach ($orderItems as $index => $cartItem) {
                            $itemClassNames = 'mb-4';
    
                            if ($index % 2 === 0) {
                                $itemClassNames .= ' has-background-white-bis';
                            }
    
                            include(__DIR__ . '/../partials/cart_summary_item.php');
                        }
                    ?>
                </ul>
            </div>
            <div class="is-flex is-justify-content-flex-end">
                <a
                    href="/cart"
                    class="button is-info is-small"
                >
                    <span class="icon mr-1">
                        <span class="material-icons is-size-6">
                            mode_edit
                        </span>
                    </span>
                    Edit cart
                </a>
            </div>
        </div>
    </div>
</div>

<?php include(__DIR__ . '/../partials/footer.php'); ?>
