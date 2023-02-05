<div class="modal delete-modal">
  <div class="modal-background delete-cancel"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">
        <?= ServiceI18n::t('partials.delete_modal.title') ?>
      </p>
      <button class="delete delete-cancel" aria-label="close"></button>
    </header>
    <section class="modal-card-body delete-question"></section>
    <footer class="modal-card-foot">
      <button class="button delete-cancel mr-auto">
        <?= ServiceI18n::t('partials.delete_modal.cancel') ?>
      </button>
      <button class="button is-danger delete-confirmation">
        <?= ServiceI18n::t('partials.delete_modal.delete') ?>
      </button>
    </footer>
  </div>
</div>
