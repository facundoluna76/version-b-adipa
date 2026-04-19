<section class="testimonials" aria-labelledby="testimonials-heading">
    <div class="testimonials__inner">

        <div class="testimonials__header">
            <h2 id="testimonials-heading" style="font-size:1.75rem;font-weight:900;color:#0F0F1A;">
                Lo que dicen nuestros estudiantes
            </h2>
        </div>

        <div class="testimonials__grid">
            @foreach([
                [
                    'name'   => 'Ps. Javiera Mendoza',
                    'role'   => 'Psicóloga Clínica, Santiago',
                    'quote'  => 'ADIPA transformó mi práctica clínica. El curso de psicoterapia breve me dio herramientas concretas que aplico desde la primera sesión.',
                    'avatar' => 'JM',
                    'stars'  => 5,
                ],
                [
                    'name'   => 'Dr. Cristóbal Reyes',
                    'role'   => 'Neuropsicólogo, Buenos Aires',
                    'quote'  => 'La calidad de los docentes es impresionante. Aprendí más en 20 horas que en años de práctica independiente. Totalmente recomendado.',
                    'avatar' => 'CR',
                    'stars'  => 5,
                ],
                [
                    'name'   => 'Mg. Daniela Fuentes',
                    'role'   => 'Psicóloga Organizacional, Medellín',
                    'quote'  => 'Excelente plataforma. El contenido es actualizado, los materiales son de calidad y el soporte al estudiante es muy rápido.',
                    'avatar' => 'DF',
                    'stars'  => 5,
                ],
            ] as $t)
                <blockquote class="testimonials__card">
                    <div class="testimonials__stars" aria-label="{{ $t['stars'] }} estrellas de 5">
                        @for($i = 0; $i < $t['stars']; $i++)
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

    </div>
</section>