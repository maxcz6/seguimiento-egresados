<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Sistema de Seguimiento de Egresados')</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/guest-nav.css') }}">
</head>
<body>
    <header class="guest-header">
        <nav class="guest-nav">
            <ul class="guest-nav__list">
                <li class="guest-nav__item">
                    <a href="{{ route('index') }}" class="guest-nav__link">Inicio</a>
                </li>
                <li class="guest-nav__item">
                    <a href="{{ route('login') }}" class="guest-nav__link">Ingresar</a>
                </li>
            </ul>
        </nav>
    </header>

    <main class="guest-main">
        @yield('content')
        
    </main>
</body>
</html>
