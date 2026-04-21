// ─── Testimonials carousel (3 visible) ───────────────────────────────
(function () {
  var AUTO_INTERVAL = 4500;
  var VISIBLE = 3;

  document.querySelectorAll('[data-carousel]').forEach(function (root) {
    var slides = Array.from(root.querySelectorAll('[data-slide]'));
    var total = slides.length;
    var inner = root.closest('.testimonials__inner');
    var dotsWrap = inner ? inner.querySelector('.testimonials__dots') : null;
    var dots = dotsWrap ? Array.from(dotsWrap.querySelectorAll('[data-dot]')) : [];

    var current = 0;
    var paused = false;
    var animating = false;
    var timer = null;

    /* Return an array of VISIBLE indices starting at `from`, wrapping */
    function windowOf(from) {
      return Array.from({ length: VISIBLE }, function (_, i) {
        return (from + i) % total;
      });
    }

    function applyVisible(indices) {
      slides.forEach(function (slide, i) {
        var on = indices.indexOf(i) !== -1;
        slide.classList.toggle('u-hidden', !on);
        slide.setAttribute('aria-hidden', on ? 'false' : 'true');
      });
    }

    function show(next, direction) {
      if (animating || next === current) return;
      animating = true;

      var leavingClass = direction === 'next' ? 'is-leaving-next' : 'is-leaving-prev';
      var prevWindow = windowOf(current);
      var nextWindow = windowOf(next);

      /* animate current cards out */
      prevWindow.forEach(function (i) {
        slides[i].classList.add(leavingClass);
      });

      setTimeout(function () {
        /* hide old */
        prevWindow.forEach(function (i) {
          slides[i].classList.remove(leavingClass);
          slides[i].classList.add('u-hidden');
          slides[i].setAttribute('aria-hidden', 'true');
        });

        /* show new */
        nextWindow.forEach(function (i) {
          slides[i].classList.remove('u-hidden');
          slides[i].setAttribute('aria-hidden', 'false');
          void slides[i].offsetWidth; /* force reflow for transition */
        });

        current = next;
        animating = false;

        /* update dots */
        dots.forEach(function (d, i) {
          d.classList.toggle('is-active', i === current);
          d.setAttribute('aria-selected', i === current ? 'true' : 'false');
        });
      }, 280);
    }

    function goNext() { show((current + 1) % total, 'next'); }
    function goPrev() { show((current - 1 + total) % total, 'prev'); }

    /* Arrows */
    var prevBtn = root.querySelector('[data-carousel-prev]');
    var nextBtn = root.querySelector('[data-carousel-next]');
    if (prevBtn) prevBtn.addEventListener('click', function () { goPrev(); resetTimer(); });
    if (nextBtn) nextBtn.addEventListener('click', function () { goNext(); resetTimer(); });

    /* Dots */
    dots.forEach(function (dot) {
      dot.addEventListener('click', function () {
        var idx = parseInt(dot.getAttribute('data-dot'), 10);
        show(idx, idx > current ? 'next' : 'prev');
        resetTimer();
      });
    });

    /* Pause on hover */
    [root, dotsWrap].forEach(function (el) {
      if (!el) return;
      el.addEventListener('mouseenter', function () { paused = true; });
      el.addEventListener('mouseleave', function () { paused = false; });
    });

    /* Auto-advance */
    function tick() {
      if (!paused) goNext();
      timer = setTimeout(tick, AUTO_INTERVAL);
    }

    function resetTimer() {
      clearTimeout(timer);
      timer = setTimeout(tick, AUTO_INTERVAL);
    }

    /* Init: ensure first 3 are visible */
    applyVisible(windowOf(0));
    timer = setTimeout(tick, AUTO_INTERVAL);
  });
})();
