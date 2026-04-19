<section class="contact" id="contacto" aria-labelledby="contact-heading">
    <div class="contact__inner">
        <div class="contact__grid">

            {{-- Info --}}
            <div class="fade-in">
                <p class="contact__info-label">Contacto</p>
                <h2 id="contact-heading" class="contact__info-title">
                    ¿Tienes dudas? <span class="gradient-text">Estamos para ayudarte</span>
                </h2>
                <p class="contact__info-desc">
                    Nuestro equipo de orientadores vocacionales te ayudará a encontrar
                    el programa ideal para potenciar tu carrera.
                </p>

                <ul class="contact__contact-list">
                    @foreach([
                        ['icon' => '💬', 'title' => 'WhatsApp',  'detail' => '+56 9 1234 5678',   'sub' => 'Respuesta inmediata en horario laboral'],
                        ['icon' => '✉️', 'title' => 'Email',     'detail' => 'contacto@adipa.cl', 'sub' => 'Respondemos en menos de 24 horas'],
                        ['icon' => '📞', 'title' => 'Teléfono',  'detail' => '+56 2 1234 5678',   'sub' => 'Lunes a Viernes, 9:00 - 18:00'],
                    ] as $item)
                        <li class="contact__contact-item">
                            <div class="contact__contact-icon" aria-hidden="true">{{ $item['icon'] }}</div>
                            <div>
                                <p class="contact__contact-title">{{ $item['title'] }}</p>
                                <p class="contact__contact-detail">{{ $item['detail'] }}</p>
                                <p class="contact__contact-sub">{{ $item['sub'] }}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>

                <div class="contact__trust">
                    @foreach([
                        'Asesoría personalizada sin costo',
                        'Respuesta garantizada en 24 horas',
                        'Información detallada de cada programa',
                    ] as $item)
                        <p class="contact__trust-item">
                            <span class="contact__trust-icon" aria-hidden="true">✓</span>
                            {{ $item }}
                        </p>
                    @endforeach
                </div>
            </div>

            {{-- Form --}}
            <div class="contact__form-wrap fade-in fade-in--delay-2">
                <h3 class="contact__form-title">Envíanos un mensaje</h3>

                <div id="contact-success" class="contact__success">
                    <div class="contact__success-icon">🎉</div>
                    <p class="contact__success-title">¡Mensaje enviado!</p>
                    <p class="contact__success-text">Te responderemos en menos de 24 horas.</p>
                </div>

                <form class="contact__form" id="contact-form" novalidate>
                    <div class="contact__field">
                        <label class="contact__label" for="contact-name">Nombre completo</label>
                        <input
                            type="text"
                            id="contact-name"
                            class="contact__input"
                            placeholder="Tu nombre"
                            autocomplete="name"
                        >
                        <span class="contact__error" id="error-name">Por favor ingresa tu nombre.</span>
                    </div>

                    <div class="contact__field">
                        <label class="contact__label" for="contact-email">Correo electrónico</label>
                        <input
                            type="email"
                            id="contact-email"
                            class="contact__input"
                            placeholder="tu@email.com"
                            autocomplete="email"
                        >
                        <span class="contact__error" id="error-email">Por favor ingresa un email válido.</span>
                    </div>

                    <div class="contact__field">
                        <label class="contact__label" for="contact-message">Mensaje</label>
                        <textarea
                            id="contact-message"
                            class="contact__textarea"
                            placeholder="¿En qué podemos ayudarte?"
                            rows="4"
                        ></textarea>
                        <span class="contact__error" id="error-message">Por favor escribe tu mensaje.</span>
                    </div>

                    <button type="submit" class="contact__submit" id="contact-submit">
                        Enviar mensaje
                    </button>
                </form>
            </div>

        </div>
    </div>
</section>