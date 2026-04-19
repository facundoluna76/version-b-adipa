// ─── FadeIn con IntersectionObserver ─────────────────────────────────
(function () {

  // Stagger automático para cards de la grilla
  document.querySelectorAll('.courses__grid .course-card').forEach(function (card, i) {
    card.classList.add('fade-in');
    card.style.transitionDelay = (i % 3 * 120) + 'ms';
  });

  const observer = new IntersectionObserver(
    function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          // requestAnimationFrame garantiza que el CSS ya pintó antes de agregar la clase
          requestAnimationFrame(function () {
            entry.target.classList.add('fade-in--visible');
          });
          observer.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.12 }
  );

  // Elementos above-the-fold (hero): pequeño delay para que la transición sea visible
  document.querySelectorAll('.hero .fade-in').forEach(function (el, i) {
    setTimeout(function () {
      el.classList.add('fade-in--visible');
    }, 120 + i * 120);
  });

  // Resto de elementos: usar IntersectionObserver
  document.querySelectorAll('.fade-in:not(.hero .fade-in)').forEach(function (el) {
    observer.observe(el);
  });

})();
