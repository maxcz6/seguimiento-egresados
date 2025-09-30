<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrador</title>
    <link rel="stylesheet" href="{{ asset('css/navvar.css') }}">
</head>
<body>
    {{-- Navbar egresado --}}
    @include('components.navvar-empresa')

    {{-- Contenido principal --}}
    <main class="content">
        @yield('content')
    </main>

    <footer>
        <p class="pfoo">© {{ date('Y') }} Seguimiento de Egresados. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
