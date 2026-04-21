<!DOCTYPE html>
<html lang="es" id="html-root">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Plataforma de educación continua especializada en psicología y salud mental. Más de 200 cursos con certificado.">
    <title>ADIPA — Cursos de Psicología con Certificado 2026</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&display=swap" rel="stylesheet">

    {{-- CSS compilado por Gulp --}}
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

        {{-- Prevent dark mode flash --}}
    <script>
        (function() {
            if (localStorage.getItem('adipa-theme') === 'dark') {
                document.body.classList.add('dark');
            }
        })();
    </script>
</head>
<body>

    @include('partials.header')

    <main id="main-content">
        @yield('content')
    </main>

    @include('partials.footer')

    {{-- JS compilado por Gulp --}}
    <script src="{{ asset('js/main.js') }}"></script>

</body>
</html>