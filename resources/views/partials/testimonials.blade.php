<section class="testimonials" aria-labelledby="testimonials-heading">
    <div class="testimonials__inner">

        <div class="testimonials__header fade-in">
            <h2 id="testimonials-heading" class="testimonials__heading">
                Lo que dicen nuestros <span class="gradient-text">estudiantes</span>
            </h2>
        </div>

        @php
        $items = [
            ['name' => 'Ps. Javiera Mendoza',  'role' => 'Psicóloga Clínica, Santiago',         'quote' => 'ADIPA transformó mi práctica clínica. El curso de psicoterapia breve me dio herramientas concretas que aplico desde la primera sesión.',                                       'avatar' => 'JM', 'stars' => 5],
            ['name' => 'Dr. Cristóbal Reyes',  'role' => 'Neuropsicólogo, Buenos Aires',         'quote' => 'La calidad de los docentes es impresionante. Aprendí más en 20 horas que en años de práctica independiente. Totalmente recomendado.',                                        'avatar' => 'CR', 'stars' => 5],
            ['name' => 'Mg. Daniela Fuentes',  'role' => 'Psicóloga Organizacional, Medellín',   'quote' => 'Excelente plataforma. El contenido es actualizado, los materiales son de calidad y el soporte al estudiante es muy rápido.',                                                 'avatar' => 'DF', 'stars' => 5],
            ['name' => 'Lic. Rodrigo Saavedra','role' => 'Psicoterapeuta, Lima',                 'quote' => 'Los docentes tienen un nivel académico excepcional. Cada módulo está muy bien estructurado y los casos clínicos son muy pertinentes.',                                        'avatar' => 'RS', 'stars' => 5],
            ['name' => 'Ps. Camila Torres',    'role' => 'Psicóloga Infantil, Bogotá',           'quote' => 'Me encanta la flexibilidad de los cursos. Puedo aprender a mi ritmo sin descuidar mis pacientes. 100% recomendado para profesionales.',                                     'avatar' => 'CT', 'stars' => 5],
        ];
        @endphp

        <div
            class="testimonials__carousel"
            data-carousel
            aria-label="Carrusel de testimonios"
        >
            {{-- Prev arrow --}}
            <button
                class="testimonials__arrow"
                data-carousel-prev
                aria-label="Testimonio anterior"
            >
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="15 18 9 12 15 6"></polyline></svg>
            </button>

            {{-- Viewport: shows 3 cards at a time --}}
            <div class="testimonials__viewport">
                @foreach($items as $i => $t)
                    <blockquote
                        class="testimonials__card{{ $i >= 3 ? ' u-hidden' : '' }}"
                        data-slide="{{ $i }}"
                        aria-hidden="{{ $i >= 3 ? 'true' : 'false' }}"
                    >
                        <div class="testimonials__stars" aria-label="{{ $t['stars'] }} estrellas de 5">
                            @for($j = 0; $j < $t['stars']; $j++)
                                <span aria-hidden="true">★</span>
                            @endfor
                        </div>
                        <p class="testimonials__quote">"{{ $t['quote'] }}"</p>
                        <footer class="testimonials__author">
                            <div class="testimonials__avatar" aria-hidden="true">{{ $t['avatar'] }}</div>
                            <div>
                                <cite class="testimonials__name">{{ $t['name'] }}</cite>
                                <span class="testimonials__role">{{ $t['role'] }}</span>
                            </div>
                        </footer>
                    </blockquote>
                @endforeach
            </div>

            {{-- Next arrow --}}
            <button
                class="testimonials__arrow"
                data-carousel-next
                aria-label="Siguiente testimonio"
            >
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </button>
        </div>

        {{-- Dots --}}
        <div class="testimonials__dots" role="tablist" aria-label="Indicadores de testimonio">
            @foreach($items as $i => $t)
                <button
                    class="testimonials__dot{{ $i === 0 ? ' is-active' : '' }}"
                    data-dot="{{ $i }}"
                    role="tab"
                    aria-label="Ir al testimonio {{ $i + 1 }}"
                    aria-selected="{{ $i === 0 ? 'true' : 'false' }}"
                ></button>
            @endforeach
        </div>

    </div>
</section>
