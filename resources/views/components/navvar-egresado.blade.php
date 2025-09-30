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
            <li><a href="{{ route('egresado.inicio') }}" class="navvarA__nav-link">🏠 Inicio</a></li>
            <li><a href="{{ route('egresado.perfil') }}" class="navvarA__nav-link">👤 Mi Perfil</a></li>
            <li><a href="{{ route('egresado.misSeguimientos') }}" class="navvarA__nav-link">📋 Mis Seguimientos</a></li>
            <li><a href="{{ route('egresado.encuestas') }}" class="navvarA__nav-link">📝 Encuesta</a></li>
            <li><a href="{{ route('egresado.reportes') }}" class="navvarA__nav-link">📊 Reportes</a></li>
            <li><a href="{{ route('egresado.oportunidades') }}" class="navvarA__nav-link">💼 Oportunidades</a></li>

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
        <li><a href="{{ route('egresado.inicio') }}" class="navvarA__mobile-nav-link">🏠 Inicio</a></li>
        <li><a href="{{ route('egresado.perfil') }}" class="navvarA__mobile-nav-link">👤 Mi Perfil</a></li>
        <li><a href="{{ route('egresado.misSeguimientos') }}" class="navvarA__mobile-nav-link">📋 Mis Seguimientos</a></li>
        <li><a href="{{ route('egresado.encuestas') }}" class="navvarA__mobile-nav-link">📝 Encuesta</a></li>
        <li><a href="{{ route('egresado.reportes') }}" class="navvarA__mobile-nav-link">📊 Reportes</a></li>
        <li><a href="{{ route('egresado.oportunidades') }}" class="navvarA__mobile-nav-link">💼 Oportunidades</a></li>

        {{-- 🔒 Botón de cerrar sesión para móvil --}}
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="navvarA__mobile-nav-link logout-btn"
                        style="background:none; border:none; cursor:pointer; width:100%; text-align:left;">
                    🚪 Cerrar sesión
                </button>
            </form>
        </li>
    </ul>
</div>
