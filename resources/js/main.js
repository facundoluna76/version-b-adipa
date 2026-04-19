// ─── General utilities ────────────────────────────────────────────────
(function ($) {

  // ── Smooth scroll for anchor links ────────────────────────────────
  $(document).on('click', 'a[href^="#"]', function (e) {
    const target = $(this.getAttribute('href'));
    if (target.length) {
      e.preventDefault();
      $('html, body').animate({
        scrollTop: target.offset().top - 100
      }, 400);
    }
  });

  // ── Wave color sync with dark mode ────────────────────────────────
  function syncWave() {
    const isDark = $('body').hasClass('dark');
    $('.hero__wave path').attr('fill', isDark ? '#1A1A2E' : '#ffffff');
  }

  syncWave();

  // Re-sync when theme toggles
  $('#theme-toggle').on('click', function () {
    setTimeout(syncWave, 50);
  });

  // ── Tabindex on course cards ───────────────────────────────────────
  $('.course-card').attr('tabindex', '0');

})(jQuery);