<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Evitar formularios cacheados --}}
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">

    <title>@yield('title', 'Autenticación - Seguimiento de Egresados')</title>


    <link rel="stylesheet" href="{{ asset('css/guest-nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
        <header class="guest-header">
        <nav class="guest-nav">
            <ul class="guest-nav__list">
                <li class="guest-nav__item">
                    <a href="{{ route('index') }}" class="guest-nav__link">Inicio</a>
                </li>
            </ul>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>


</body>
</html>
