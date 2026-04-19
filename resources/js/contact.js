// ─── Contact form ─────────────────────────────────────────────────────
(function ($) {

  const $form    = $('#contact-form');
  const $submit  = $('#contact-submit');
  const $success = $('#contact-success');

  $form.on('submit', function (e) {
    e.preventDefault();

    if (!validate()) return;

    // Spinner
    $submit.text('Enviando…').prop('disabled', true);

    // Simulate send
    setTimeout(function () {
      $form.hide();
      $success.addClass('is-visible');
    }, 1500);
  });

  function validate() {
    let valid = true;

    const name    = $('#contact-name').val().trim();
    const email   = $('#contact-email').val().trim();
    const message = $('#contact-message').val().trim();

    // Name
    if (!name) {
      showError('contact-name', 'error-name');
      valid = false;
    } else {
      clearError('contact-name', 'error-name');
    }

    // Email
    const emailOk = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    if (!emailOk) {
      showError('contact-email', 'error-email');
      valid = false;
    } else {
      clearError('contact-email', 'error-email');
    }

    // Message
    if (!message) {
      showError('contact-message', 'error-message');
      valid = false;
    } else {
      clearError('contact-message', 'error-message');
    }

    return valid;
  }

  function showError(inputId, errorId) {
    $('#' + inputId).addClass('has-error');
    $('#' + errorId).addClass('is-visible');
  }

  function clearError(inputId, errorId) {
    $('#' + inputId).removeClass('has-error');
    $('#' + errorId).removeClass('is-visible');
  }

})(jQuery);