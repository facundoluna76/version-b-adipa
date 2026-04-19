// ─── Course filtering ─────────────────────────────────────────────────
(function ($) {

  const $grid    = $('#courses-grid');
  const $empty   = $('#courses-empty');
  const $count   = $('#result-count');
  const $cards   = $grid.find('.course-card');

  // ── Initialize counts ─────────────────────────────────────────────
  function initCounts() {
    // Category counts
    const catCounts = {};
    $cards.each(function () {
      const cat = $(this).data('category');
      catCounts[cat] = (catCounts[cat] || 0) + 1;
    });
    $('[data-category-count]').each(function () {
      const cat = $(this).data('category-count');
      const count = cat === 'todos'
        ? $cards.length
        : (catCounts[cat] || 0);
      $(this).text(count);
    });

    // Modality counts
    const modCounts = {};
    $cards.each(function () {
      const mod = $(this).data('modality');
      modCounts[mod] = (modCounts[mod] || 0) + 1;
    });
    $('[data-modality-count]').each(function () {
      const mod = $(this).data('modality-count');
      $(this).text(modCounts[mod] || 0);
    });
  }

  initCounts();

  // ── State ─────────────────────────────────────────────────────────
  let state = {
    search:     '',
    category:   'todos',
    modalities: [],
    sort:       'relevance',
  };

  // ── Apply filters ─────────────────────────────────────────────────
  function applyFilters() {
    let $visible = $cards.filter(function () {
      const $c = $(this);

      // Search
      if (state.search) {
        const q = state.search.toLowerCase();
        const matches =
          $c.data('title').includes(q) ||
          $c.data('instructor').includes(q) ||
          $c.data('description').includes(q);
        if (!matches) return false;
      }

      // Category
      if (state.category !== 'todos' && $c.data('category') !== state.category) {
        return false;
      }

      // Modality
      if (state.modalities.length > 0 && !state.modalities.includes($c.data('modality'))) {
        return false;
      }

      return true;
    });

    // Sort
    let sorted = $visible.toArray();
    if (state.sort === 'rating') {
      sorted.sort((a, b) => $(b).data('rating') - $(a).data('rating'));
    } else if (state.sort === 'price-asc') {
      sorted.sort((a, b) => $(a).data('price') - $(b).data('price'));
    } else if (state.sort === 'price-desc') {
      sorted.sort((a, b) => $(b).data('price') - $(a).data('price'));
    } else {
      sorted.sort((a, b) => {
        const af = $(a).data('featured') === 1 || $(a).data('featured') === '1';
        const bf = $(b).data('featured') === 1 || $(b).data('featured') === '1';
        if (af && !bf) return -1;
        if (!af && bf) return 1;
        return 0;
      });
    }

    // Show/hide
    $cards.hide();
    $(sorted).show();

    // Re-append in sorted order
    $.each(sorted, function (_, el) { $grid.append(el); });

    // Update count
    const n = sorted.length;
    $count.text(n);

    // Empty state
    if (n === 0) {
      $empty.show();
      $grid.hide();
    } else {
      $empty.hide();
      $grid.show();
    }

    updateActiveBadge();
  }

  // ── Active filter count badge ──────────────────────────────────────
  function countActive() {
    let n = 0;
    if (state.search)              n++;
    if (state.category !== 'todos') n++;
    n += state.modalities.length;
    return n;
  }

  function updateActiveBadge() {
    const n = countActive();
    const $sb = $('#sidebar-active-badge');
    const $mb = $('#mobile-filter-badge');
    const $toggle = $('#filter-toggle');
    const $clear = $('#clear-filters, #clear-filters-empty');

    if (n > 0) {
      $sb.text(n).show();
      $mb.text(n).show();
      $toggle.addClass('has-active');
      $clear.show();
    } else {
      $sb.hide();
      $mb.hide();
      $toggle.removeClass('has-active');
      $clear.hide();
    }
  }

  // ── Search input ──────────────────────────────────────────────────
  $('#filter-search').on('input', function () {
    state.search = $(this).val().trim().toLowerCase();
    applyFilters();
  });

  // ── Category ──────────────────────────────────────────────────────
  $(document).on('click', '[data-category]', function () {
    state.category = $(this).data('category');
    $('[data-category]').removeClass('is-active');
    $(this).addClass('is-active');
    applyFilters();
  });

  // ── Modality ──────────────────────────────────────────────────────
  $(document).on('change', '.modality-check', function () {
    const val = $(this).val();
    if ($(this).is(':checked')) {
      state.modalities.push(val);
    } else {
      state.modalities = state.modalities.filter(m => m !== val);
    }
    applyFilters();
  });

  // ── Sort ──────────────────────────────────────────────────────────
  $('#sort-select').on('change', function () {
    state.sort = $(this).val();
    applyFilters();
  });

  // ── Clear filters ─────────────────────────────────────────────────
  function clearAll() {
    state = { search: '', category: 'todos', modalities: [], sort: state.sort };
    $('#filter-search').val('');
    $('[data-category]').removeClass('is-active');
    $('[data-category="todos"]').addClass('is-active');
    $('.modality-check').prop('checked', false);
    applyFilters();
  }

  $(document).on('click', '#clear-filters, #clear-filters-empty', clearAll);

  // ── Mobile drawer ─────────────────────────────────────────────────
  $('#filter-toggle').on('click', function () {
    $('#filter-drawer').addClass('is-open');
    $('body').css('overflow', 'hidden');
  });

  $(document).on('click', '#filter-drawer-backdrop, #filter-drawer-close, #filter-drawer-apply', function () {
    $('#filter-drawer').removeClass('is-open');
    $('body').css('overflow', '');
  });

})(jQuery);