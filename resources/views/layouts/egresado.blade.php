<!DOCTYPE html>  
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Egresado</title>
    {{-- Estilos futuristas compartidos --}}
    <link rel="stylesheet" href="{{ asset('css/navvar.css') }}">
</head>
<body>
    {{-- Navbar egresado --}}
    @include('components.navvar-egresado')

    <main class="content">
        @yield('content')
    </main>

    {{-- Funcionalidad del navbar --}}
    <script src="{{ asset('js/navvar.js') }}"></script>
</body>
</html>
