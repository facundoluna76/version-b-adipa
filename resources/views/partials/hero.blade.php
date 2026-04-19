<section class="hero" aria-label="Hero — Catálogo de cursos">

    {{-- Blobs decorativos --}}
    <div class="hero__blobs" aria-hidden="true">
        <div class="hero__blob hero__blob--1"></div>
        <div class="hero__blob hero__blob--2"></div>
    </div>

    <div class="hero__inner">

        {{-- Trust indicators --}}
        <div class="hero__trust fade-in">
            <span class="hero__trust-item">⭐ <strong style="color:white">4.9/5</strong> Valoración promedio</span>
            <span class="hero__trust-divider" aria-hidden="true"></span>
            <span class="hero__trust-item">👥 <strong style="color:white">+15.000</strong> Profesionales formados</span>
            <span class="hero__trust-divider" aria-hidden="true"></span>
            <span class="hero__trust-item">🎓 Certificado de participación incluido</span>
        </div>

        {{-- Heading --}}
        <h1 class="hero__heading fade-in fade-in--delay-1">
            Cursos de Psicología y salud mental con hasta
            <span class="hero__heading-accent">35% OFF</span>
        </h1>

        {{-- Subheading --}}
        <p class="hero__subheading fade-in fade-in--delay-2">
            Vive la mejor experiencia de aprendizaje y potencia tus conocimientos
            a través de nuestros cursos y diplomados.
        </p>

        {{-- Search --}}
        <div class="hero__search fade-in fade-in--delay-3">
            <form class="hero__search-form" role="search">
                <input
                    type="search"
                    class="hero__search-input"
                    placeholder="¿Qué quieres aprender?"
                    aria-label="Buscar cursos"
                    id="hero-search"
                >
                <button type="submit" class="hero__search-btn" aria-label="Buscar">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
                </button>
            </form>
        </div>

        {{-- Pills --}}
        <div class="hero__pills fade-in fade-in--delay-4">
            <span class="hero__pill-label">Buscar:</span>
            @foreach(['Autismo', 'Wisc', 'Ados', 'Trauma', 'ADI-R', 'WAIS', 'Peers'] as $tag)
                <button class="hero__pill" data-search="{{ $tag }}">{{ $tag }}</button>
            @endforeach
        </div>

    </div>

    {{-- Wave --}}
    <div class="hero__wave" aria-hidden="true">
        <svg viewBox="0 0 1440 48" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
            <path d="M0 48 C240 0 480 48 720 24 C960 0 1200 48 1440 24 L1440 48 Z" fill="white"/>
        </svg>
    </div>

</section>

{{-- Stats --}}
<section class="stats" aria-label="Estadísticas de ADIPA">
    <div class="stats__inner">
        <div class="stats__grid">
            @foreach($stats as $stat)
                <div class="stats__item fade-in fade-in--delay-{{ $loop->index + 1 }}">
                    <span class="stats__value">{{ $stat['value'] }}</span>
                    <span class="stats__label">{{ $stat['label'] }}</span>
                </div>
            @endforeach
        </div>
    </div>
</section>