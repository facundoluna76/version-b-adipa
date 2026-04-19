<footer class="footer" aria-label="Pie de página">
    <div class="footer__main">
        <div class="footer__grid">

            {{-- Brand column --}}
            <div>
                <a href="/" class="footer__brand-logo" aria-label="ADIPA — Inicio">
                    <img src="{{ asset('images/logo-adipa.svg') }}" alt="ADIPA" width="140" height="27">
                </a>
                <p class="footer__brand-desc">
                    Plataforma de educación continua especializada en psicología y
                    salud mental con presencia en Chile y Latinoamérica.
                </p>

                <ul class="footer__contact-list">
                    <li class="footer__contact-item">
                        <span class="footer__contact-icon" aria-hidden="true">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                        </span>
                        <a href="mailto:contacto@adipa.cl">contacto@adipa.cl</a>
                    </li>
                    <li class="footer__contact-item">
                        <span class="footer__contact-icon" aria-hidden="true">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.42 2 2 0 0 1 3.6 1.24h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.82a16 16 0 0 0 6.29 6.29l.95-.95a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                        </span>
                        <a href="tel:+56912345678">+56 9 1234 5678</a>
                    </li>
                    <li class="footer__contact-item">
                        <span class="footer__contact-icon" aria-hidden="true">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                        </span>
                        <span>Santiago de Chile, Chile</span>
                    </li>
                </ul>

                <div class="footer__social" aria-label="Redes sociales">
                    <a href="#" class="footer__social-link" aria-label="Instagram">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/></svg>
                    </a>
                    <a href="#" class="footer__social-link" aria-label="Facebook">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                    </a>
                    <a href="#" class="footer__social-link" aria-label="LinkedIn">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
                    </a>
                    <a href="#" class="footer__social-link" aria-label="YouTube">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.95-1.96C18.88 4 12 4 12 4s-6.88 0-8.6.46A2.78 2.78 0 0 0 1.46 6.42 29 29 0 0 0 1 12a29 29 0 0 0 .46 5.58 2.78 2.78 0 0 0 1.94 1.96C5.12 20 12 20 12 20s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-1.96A29 29 0 0 0 23 12a29 29 0 0 0-.46-5.58zM9.75 15.02V8.98L15.5 12l-5.75 3.02z"/></svg>
                    </a>
                    <a href="#" class="footer__social-link" aria-label="Twitter / X">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                    </a>
                </div>
            </div>

            {{-- Link columns --}}
            @foreach([
                ['title' => 'Formación', 'links' => ['Cursos', 'Diplomados', 'Especializaciones', 'Sesiones Magistrales', 'Seminarios']],
                ['title' => 'Recursos',  'links' => ['Blog', 'eBooks gratuitos', 'Glosario', 'Investigaciones']],
                ['title' => 'ADIPA',     'links' => ['Quiénes somos', 'Acreditaciones', 'Docentes', 'Trabaja con nosotros']],
            ] as $col)
                <div>
                    <h3 class="footer__col-title">{{ $col['title'] }}</h3>
                    <ul class="footer__links">
                        @foreach($col['links'] as $link)
                            <li><a href="#" class="footer__link">{{ $link }}</a></li>
                        @endforeach
                    </ul>
                </div>
            @endforeach

        </div>
    </div>

    {{-- Bottom bar --}}
    <div class="footer__bottom">
        <div class="footer__bottom-inner">
            <p class="footer__copy">© {{ date('Y') }} ADIPA. Todos los derechos reservados.</p>
            <nav class="footer__legal" aria-label="Links legales">
                @foreach(['Términos y condiciones', 'Política de privacidad', 'Cookies'] as $item)
                    <a href="#" class="footer__legal-link">{{ $item }}</a>
                @endforeach
            </nav>
        </div>
    </div>
</footer>