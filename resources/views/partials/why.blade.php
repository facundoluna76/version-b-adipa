<section class="why" aria-labelledby="why-heading">
    <div class="why__inner">

        <div class="why__header">
            <p style="font-size:.875rem;font-weight:700;text-transform:uppercase;letter-spacing:.08em;color:#6C5CE7;margin-bottom:.5rem;">
                ¿Por qué elegirnos?
            </p>
            <h2 id="why-heading" style="font-size:1.75rem;font-weight:900;color:#0F0F1A;margin-bottom:1rem;">
                La plataforma que eligen los <span class="gradient-text">profesionales</span>
            </h2>
            <p>
                Más de 15.000 psicólogos y profesionales de la salud mental ya eligieron ADIPA para potenciar su carrera.
            </p>
        </div>

        <div class="why__grid">
            @foreach([
                ['icon' => '🏆', 'title' => 'Certificado oficial',        'desc' => 'Todos los cursos incluyen certificado de participación reconocido en Chile y Latinoamérica.'],
                ['icon' => '🛡️', 'title' => 'Docentes expertos',          'desc' => 'Aprende con más de 50 especialistas activos en sus áreas, con experiencia clínica real.'],
                ['icon' => '🌎', 'title' => 'Acceso desde cualquier lugar','desc' => 'Cursos online, en vivo y presenciales. Accede desde Chile, México, Colombia y más.'],
                ['icon' => '⏰', 'title' => 'Flexibilidad horaria',        'desc' => 'Clases en vivo grabadas disponibles 24/7. Aprende a tu ritmo sin perder contenido.'],
            ] as $card)
                <div class="why__card">
                    <div class="why__icon" aria-hidden="true">{{ $card['icon'] }}</div>
                    <h3 class="why__card-title">{{ $card['title'] }}</h3>
                    <p class="why__card-desc">{{ $card['desc'] }}</p>
                </div>
            @endforeach
        </div>

    </div>
</section>