<!-- Botón hamburguesa -->
<div class="navvarA__hamburger" onclick="toggleMenu()">
    <span></span>
    <span></span>
    <span></span>
</div>

<!-- Navbar escritorio -->
<nav class="navvarA">
    <div class="navvarA__container">
        <!-- Logo -->
        <div class="navvarA__logo">
            <div class="navvarA__logo-icon">SE</div>
            <div class="navvarA__logo-text">Seguimiento</div>
        </div>

        <!-- Opciones de navegación -->
        <ul class="navvarA__nav">
            <li><a href="{{ route('admin.inicio') }}" class="navvarA__nav-link">🏠 Inicio</a></li>
            <li><a href="{{ route('admin.usuarios') }}" class="navvarA__nav-link">👥 Usuarios</a></li>
            <li><a href="{{ route('admin.egresados') }}" class="navvarA__nav-link">🎓 Egresados</a></li>
            <li><a href="{{ route('admin.seguimientoLaboral') }}" class="navvarA__nav-link">💼 Seguimiento laboral</a></li>
            <li><a href="{{ route('admin.seguimientoAcademico') }}" class="navvarA__nav-link">📚 Seguimiento académico</a></li>
            <li><a href="{{ route('admin.encuestas') }}" class="navvarA__nav-link">📝 Encuestas</a></li>
            <li><a href="{{ route('admin.reportes') }}" class="navvarA__nav-link">📊 Reportes</a></li>
            <li><a href="{{ route('admin.configuracion') }}" class="navvarA__nav-link">⚙️ Configuración</a></li>
            {{-- 🔒 Botón de cerrar sesión --}}
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="navvarA__nav-link logout-btn" 
                            style="background:none; border:none; cursor:pointer; width:100%; text-align:left;">
                        🚪 Cerrar sesión
                    </button>
                </form>
            </li>

        </ul>
    </div>
</nav>

<!-- Menú móvil -->
<div class="navvarA__mobile-menu" id="mobileMenu">
    <ul class="navvarA__mobile-nav">
        <li><a href="{{ route('admin.inicio') }}" class="navvarA__mobile-nav-link">🏠 Inicio</a></li>
        <li><a href="{{ route('admin.usuarios') }}" class="navvarA__mobile-nav-link">👥 Usuarios</a></li>
        <li><a href="{{ route('admin.egresados') }}" class="navvarA__mobile-nav-link">🎓 Egresados</a></li>
        <li><a href="{{ route('admin.seguimientoLaboral') }}" class="navvarA__mobile-nav-link">💼 Seguimiento laboral</a></li>
        <li><a href="{{ route('admin.seguimientoAcademico') }}" class="navvarA__mobile-nav-link">📚 Seguimiento académico</a></li>
        <li><a href="{{ route('admin.encuestas') }}" class="navvarA__mobile-nav-link">📝 Encuestas</a></li>
        <li><a href="{{ route('admin.reportes') }}" class="navvarA__mobile-nav-link">📊 Reportes</a></li>
        <li><a href="{{ route('admin.configuracion') }}" class="navvarA__mobile-nav-link">⚙️ Configuración</a></li>
        {{-- 🔒 Botón de cerrar sesión para móvil --}}
<li>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="navbarAdmin__mobile-nav-link logout-btn"
                style="background:none; border:none; cursor:pointer; width:100%; text-align:left;">
            🚪 Cerrar sesión
        </button>
    </form>
</li>
    </ul>
</div>
