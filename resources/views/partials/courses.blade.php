<section class="courses" id="cursos" aria-labelledby="courses-heading">
    <div class="courses__inner">

        {{-- Header --}}
        <div class="courses__header fade-in">
            <p class="courses__label">Catálogo 2026</p>
            <h2 id="courses-heading" class="courses__heading">
                Cursos que te permitirán <span class="gradient-text">potenciar tu carrera</span>
            </h2>
            <p class="courses__subheading">
                Formación de alto impacto impartida por los mejores especialistas de Latinoamérica.
            </p>
        </div>

        {{-- Layout: sidebar + main --}}
        <div class="courses__layout">

            {{-- Filter sidebar (desktop) --}}
            <aside class="filter-sidebar" aria-label="Panel de filtros">
                <div class="filter-sidebar__panel">
                    <div class="filter-sidebar__header">
                        <p class="filter-sidebar__title">
                            ☰ Filtros
                        </p>
                        <span class="filter-sidebar__active-badge" id="sidebar-active-badge" style="display:none"></span>
                    </div>

                    {{-- Search --}}
                    <div class="filter-sidebar__section">
                        <p class="filter-sidebar__section-title">Buscar</p>
                        <div class="filter-sidebar__search">
                            <span class="filter-sidebar__search-icon" aria-hidden="true">🔍</span>
                            <input type="search" id="filter-search" placeholder="Título o instructor…" aria-label="Buscar cursos">
                        </div>
                    </div>

                    {{-- Category --}}
                    <div class="filter-sidebar__section">
                        <p class="filter-sidebar__section-title">Categoría</p>
                        <div id="category-list">
                            @foreach($categories as $cat)
                                <button
                                    class="filter-sidebar__radio-item {{ $cat['id'] === 'todos' ? 'is-active' : '' }}"
                                    data-category="{{ $cat['id'] }}"
                                >
                                    <span>{{ $cat['label'] }}</span>
                                    <span class="filter-sidebar__radio-count" data-category-count="{{ $cat['id'] }}">0</span>
                                </button>
                            @endforeach
                        </div>
                    </div>

                    {{-- Modality --}}
                    <div class="filter-sidebar__section">
                        <p class="filter-sidebar__section-title">Modalidad</p>
                        @foreach([['En Vivo','🔴'],['Online','💻'],['Presencial','📍']] as [$mod, $icon])
                            <label class="filter-sidebar__check-item">
                                <input type="checkbox" value="{{ $mod }}" class="modality-check">
                                <span class="filter-sidebar__check-label">
                                    {{ $mod }}
                                </span>
                                <span class="filter-sidebar__check-count" data-modality-count="{{ $mod }}">0</span>
                            </label>
                        @endforeach
                    </div>

                    {{-- Clear --}}
                    <button class="filter-sidebar__clear" id="clear-filters" style="display:none">
                        ✕ Limpiar filtros
                    </button>
                </div>
            </aside>

            {{-- Main content --}}
            <div class="courses__main">

                {{-- Top bar --}}
                <div class="courses__topbar">
                    <div class="courses__topbar-left">
                        {{-- Mobile filter toggle --}}
                        <button class="courses__filter-toggle" id="filter-toggle">
                            ☰ Filtros
                            <span class="courses__filter-badge" id="mobile-filter-badge" style="display:none"></span>
                        </button>

                        {{-- Result count --}}
                        <p class="courses__result-count" aria-live="polite">
                            <strong id="result-count">{{ count($courses) }}</strong> cursos
                        </p>
                    </div>

                    {{-- Sort --}}
                    <div class="courses__sort-wrap">
                        <select class="courses__sort" id="sort-select" aria-label="Ordenar cursos">
                            <option value="relevance">Más relevantes</option>
                            <option value="rating">Mejor valorados</option>
                            <option value="price-asc">Precio: menor a mayor</option>
                            <option value="price-desc">Precio: mayor a menor</option>
                        </select>
                    </div>
                </div>

                {{-- Grid --}}
                <div class="courses__grid" id="courses-grid">
                    @foreach($courses as $course)
                        @include('partials.course-card', ['course' => $course])
                    @endforeach
                </div>

                {{-- Empty state --}}
                <div class="courses__empty" id="courses-empty" style="display:none">
                    <div class="courses__empty-icon">📚</div>
                    <h3 class="courses__empty-title">Sin resultados</h3>
                    <p class="courses__empty-text">Ningún curso coincide con los filtros.</p>
                    <button class="courses__empty-btn" id="clear-filters-empty">Limpiar filtros</button>
                </div>

                {{-- Load more --}}
                <div class="courses__load-more">
                    <button class="courses__load-more-btn">Ver todos los cursos</button>
                </div>

            </div>
        </div>
    </div>


            {{-- Filter drawer (mobile) --}}
        <div class="filter-drawer" id="filter-drawer">
            <div class="filter-drawer__backdrop" id="filter-drawer-backdrop"></div>
            <div class="filter-drawer__panel">
                <div class="filter-drawer__handle" aria-hidden="true"></div>

                <div class="filter-drawer__header">
                    <p class="filter-drawer__title">
                        ☰ Filtros
                        <span class="filter-sidebar__active-badge" id="drawer-active-badge" style="display:none"></span>
                    </p>
                    <button class="filter-drawer__close" id="filter-drawer-close" aria-label="Cerrar filtros">✕</button>
                </div>

                {{-- Search --}}
                <div class="filter-sidebar__section">
                    <p class="filter-sidebar__section-title">Buscar</p>
                    <div class="filter-sidebar__search">
                        <span class="filter-sidebar__search-icon" aria-hidden="true">🔍</span>
                        <input type="search" id="filter-search-mobile" placeholder="Título o instructor…" aria-label="Buscar cursos">
                    </div>
                </div>

                {{-- Category --}}
                <div class="filter-sidebar__section">
                    <p class="filter-sidebar__section-title">Categoría</p>
                    @foreach($categories as $cat)
                        <button
                            class="filter-sidebar__radio-item {{ $cat['id'] === 'todos' ? 'is-active' : '' }}"
                            data-category-mobile="{{ $cat['id'] }}"
                        >
                            <span>{{ $cat['label'] }}</span>
                        </button>
                    @endforeach
                </div>

                {{-- Modality --}}
                <div class="filter-sidebar__section">
                    <p class="filter-sidebar__section-title">Modalidad</p>
                    @foreach([['En Vivo','🔴'],['Online','💻'],['Presencial','📍']] as [$mod, $icon])
                        <label class="filter-sidebar__check-item">
                            <input type="checkbox" value="{{ $mod }}" class="modality-check-mobile">
                            <span class="filter-sidebar__check-label">
                                <span aria-hidden="true">{{ $icon }}</span>
                                {{ $mod }}
                            </span>
                        </label>
                    @endforeach
                </div>

                <button class="filter-drawer__apply" id="filter-drawer-apply">
                    Ver <span id="drawer-result-count">{{ count($courses) }}</span> cursos
                </button>
            </div>
        </div>
</section>

{{-- Pass courses data to JS --}}
<script>
    window.COURSES_DATA = @json($courses);
    window.CATEGORIES_DATA = @json($categories);
</script>