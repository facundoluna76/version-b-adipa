// ─── Header interactions ──────────────────────────────────────────────
(function ($) {

  // ── Promo banner dismiss ──────────────────────────────────────────
  $('#promo-close').on('click', function () {
    $('#promo-banner').slideUp(200, updatePadding);
  });

  // ── Scroll shadow ─────────────────────────────────────────────────
  $(window).on('scroll', function () {
    $('.header').toggleClass('is-scrolled', $(window).scrollTop() > 20);
  });

  // ── Dynamic padding-top for fixed header ──────────────────────────
  function updatePadding() {
    const h = $('#header-wrapper').outerHeight() || 0;
    $('#main-content').css('padding-top', h + 'px');
  }

  updatePadding();
  $(window).on('resize', updatePadding);

  // ── Mobile menu ───────────────────────────────────────────────────
  $('#mobile-toggle').on('click', function () {
    $('#mobile-menu').addClass('is-open');
    $('body').css('overflow', 'hidden');
    $(this).attr('aria-expanded', 'true');
  });

  function closeMobileMenu() {
    $('#mobile-menu').removeClass('is-open');
    $('body').css('overflow', '');
    $('#mobile-toggle').attr('aria-expanded', 'false');
  }

  $('#mobile-close, #mobile-backdrop').on('click', closeMobileMenu);

  // ── Hero search pills ─────────────────────────────────────────────
  $('.hero__pill').on('click', function () {
    const tag = $(this).data('search');
    $('#filter-search').val(tag).trigger('input');
    $('html, body').animate({
      scrollTop: $('#cursos').offset().top - 100
    }, 400);
  });

  $('#hero-search').closest('form').on('submit', function (e) {
    e.preventDefault();
    const q = $('#hero-search').val();
    $('#filter-search').val(q).trigger('input');
    $('html, body').animate({
      scrollTop: $('#cursos').offset().top - 100
    }, 400);
  });

})(jQuery);