function deleteConfirmation(event, trigger) {
    event.preventDefault();

    var $trigger = $(trigger);

    var question = $trigger.data('question');

    $('.delete-question').text(question);
    $('.delete-modal').addClass('is-active');

    $('.delete-confirmation').on('click', function () {
        switch ($trigger.prop('tagName')) {
            case 'BUTTON': {
                const $form = $trigger.closest('form');
                $form.submit();
                break;
            }
            case 'A': {
                window.location = $trigger.attr('href');
                break;
            }
        }
    });

    $('.delete-cancel').on('click', function () {
        $('.delete-modal').removeClass('is-active');
    });
}

$('body').on('click', '.delete-trigger', function(event) {
    deleteConfirmation(event, this);
});

$('.cart-item-form-quantity').on('submit', function(event) {
    var $this = $(this);
    var $cartItem = $(this).closest('.cart-item-row');
    var $counter = $cartItem.find('.cart-item-input-quantity');

    var count = $counter.val();

    if (+count === 0) {
        var $deleteTrigger = $cartItem.find('.cart-item-delete-trigger');

        event.preventDefault();
        $deleteTrigger.click();
    }
});
