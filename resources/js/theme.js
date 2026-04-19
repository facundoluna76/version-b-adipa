// ─── Theme (dark / light mode) ────────────────────────────────────────
(function () {
  const root    = document.body;
  const btn     = document.getElementById('theme-toggle');
  const icon    = document.getElementById('theme-icon');
  const KEY     = 'adipa-theme';

  // Apply saved theme on load
  const saved = localStorage.getItem(KEY) || 'light';
  if (saved === 'dark') root.classList.add('dark');
  updateIcon(saved);

  // Toggle on click
  btn?.addEventListener('click', function () {
    const isDark = root.classList.toggle('dark');
    const next   = isDark ? 'dark' : 'light';
    localStorage.setItem(KEY, next);
    updateIcon(next);
  });

  function updateIcon(theme) {
    if (icon) icon.textContent = theme === 'dark' ? '☀️' : '🌙';
  }
})();