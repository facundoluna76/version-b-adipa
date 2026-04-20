<div id="header-wrapper">
    {{-- Promo banner --}}
    <div class="promo-banner" id="promo-banner">
        <p>
            <span>⚡</span>
            Escoge tu programa con hasta <strong>35% OFF</strong> ⚡ Solo en Black Sale
        </p>
        <button class="promo-banner__close" id="promo-close" aria-label="Cerrar banner">✕</button>
    </div>

    {{-- Header --}}
    <div class="header" role="banner">
        <div class="header__bar">
            <div class="header__inner">

                {{-- Logo --}}
                <a href="/" class="header__logo" aria-label="ADIPA — Inicio">
                    <img src="{{ asset('images/logo-adipa.svg') }}" alt="ADIPA" width="120" height="23">
                </a>

                {{-- Search --}}
                <div class="header__search">
                    <div class="header__search-wrap">
                        <input
                            type="search"
                            class="header__search-input"
                            placeholder="¿Qué quieres aprender?"
                            aria-label="Buscar cursos"
                        >
                        <button class="header__search-btn" aria-label="Buscar">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
                        </button>
                    </div>
                </div>

                {{-- Actions --}}
                <div class="header__actions">

                    {{-- Theme toggle --}}
                    <button class="header__icon-btn" id="theme-toggle" aria-label="Cambiar tema">
                        <span id="theme-icon">🌙</span>
                    </button>

                    {{-- Cart --}}
                    <button class="header__icon-btn header__cart" aria-label="Ver carrito">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
                        <span class="header__cart-badge" id="cart-count">0</span>
                    </button>

                    {{-- Auth --}}
                    <div class="header__auth">
                        <button class="header__btn-login">Iniciar Sesión</button>
                        <button class="header__btn-register">Regístrate</button>
                    </div>

                    {{-- Mobile toggle --}}
                    <button class="header__mobile-toggle" id="mobile-toggle" aria-label="Abrir menú" aria-expanded="false">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
                    </button>
                </div>
            </div>
        </div>

        {{-- Nav --}}
        <nav class="nav" aria-label="Navegación principal">
            <div class="nav__inner">
                <a href="#" class="nav__discover">
                    <span>💬</span>
                    <span>Descubre ADIPA</span>
                </a>
                <div class="nav__divider" aria-hidden="true"></div>
                @foreach($navItems as $item)
                    <a
                        href="{{ $item['href'] }}"
                        class="nav__link {{ $item['label'] === 'Cursos' ? 'is-active' : '' }}"
                    >
                        {{ $item['label'] }}
                        @if(isset($item['badge']))
                            <span class="nav__badge {{ isset($item['badgeColor']) && $item['badgeColor'] === 'cyan' ? 'nav__badge--cyan' : '' }}">
                                {{ $item['badge'] }}
                            </span>
                        @endif
                    </a>
                @endforeach
            </div>
        </nav>
    </div>
</div>

{{-- Mobile menu --}}
<div class="mobile-menu" id="mobile-menu" aria-modal="true" role="dialog" aria-label="Menú móvil">
    <div class="mobile-menu__backdrop" id="mobile-backdrop"></div>
    <div class="mobile-menu__panel">
        <div class="mobile-menu__head">
            <img src="{{ asset('images/logo-adipa.svg') }}" alt="ADIPA" height="24">
            <button class="header__icon-btn" id="mobile-close" aria-label="Cerrar menú">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            </button>
        </div>
        <div class="mobile-menu__search">
            <input type="search" class="mobile-menu__search-input" placeholder="¿Qué quieres aprender?">
        </div>
        <nav class="mobile-menu__nav">
            @foreach($navItems as $item)
                <a href="{{ $item['href'] }}" class="mobile-menu__link {{ $item['label'] === 'Cursos' ? 'is-active' : '' }}">
                    {{ $item['label'] }}
                    @if(isset($item['badge']))
                        <span class="nav__badge">{{ $item['badge'] }}</span>
                    @endif
                </a>
            @endforeach
        </nav>
        <div class="mobile-menu__footer">
            <button class="mobile-menu__btn-login">Iniciar Sesión</button>
            <button class="mobile-menu__btn-register">Regístrate</button>
        </div>
    </div>
</div>