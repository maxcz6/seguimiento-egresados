@extends('layouts.guest')
<hr>
@section('content')
<div class="container">
    {{-- BLOQUE DE BENEFICIOS - POR QUÉ UNIRSE --}}
    <section class="benefits-section">
        <h2 class="section-title">¿Por qué formar parte de nuestra comunidad?</h2>
        
        <div class="benefits-grid">
            <div class="benefit-card">
                <div class="benefit-icon">💼</div>
                <h3 class="benefit-title">Oportunidades Curadas</h3>
                <p class="benefit-description">
                    Explora una Bolsa de Trabajo exclusiva con ofertas cuidadosamente seleccionadas por tus docentes, 
                    garantizando que el puesto valore tu excelencia y se alinee con el perfil profesional de SAM.
                </p>
            </div>

            <div class="benefit-card">
                <div class="benefit-icon">🤝</div>
                <h3 class="benefit-title">Conexión de Valor</h3>
                <p class="benefit-description">
                    Reestablece el contacto with tus ex-compañeros y profesores. Nuestro sistema te permite expandir 
                    tu red profesional y acceder a mentorías o referencias directas de la comunidad.
                </p>
            </div>

            <div class="benefit-card">
                <div class="benefit-icon">📈</div>
                <h3 class="benefit-title">Crecimiento Continuo</h3>
                <p class="benefit-description">
                    No te detengas. Accede a información privilegiada sobre cursos, certificaciones y talleres 
                    de especialización. En SAM, tu desarrollo profesional es una prioridad constante.
                </p>
            </div>
        </div>
    </section>

    {{-- BLOQUE DE CIFRAS DESTACADAS - PRUEBA SOCIAL --}}
    <section class="stats-section">
        <h2 class="section-title">Nuestra Comunidad en Números</h2>
        
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-number">1,800+</div>
                <div class="stat-label">Egresados activos en la red de contactos</div>
            </div>

            <div class="stat-item">
                <div class="stat-number">45</div>
                <div class="stat-label">Oportunidades laborales nuevas cada mes</div>
            </div>

            <div class="stat-item">
                <div class="stat-number">30+</div>
                <div class="stat-label">Empresas socias que buscan talento SAM</div>
            </div>
        </div>
    </section>

    {{-- BLOQUE DE FUNCIONALIDADES DEL SISTEMA --}}
    <section class="features-section">
        <h2 class="section-title">¿Qué puedes hacer en el sistema?</h2>
        
        <div class="features-list">
            <div class="feature-item">
                <span class="feature-icon">👨‍🎓</span>
                <div class="feature-content">
                    <strong>Egresados:</strong> Actualizar perfil, postular a empleos y responder encuestas.
                </div>
            </div>

            <div class="feature-item">
                <span class="feature-icon">🏢</span>
                <div class="feature-content">
                    <strong>Empresas:</strong> Publicar ofertas laborales y capacitaciones.
                </div>
            </div>

            <div class="feature-item">
                <span class="feature-icon">📘</span>
                <div class="feature-content">
                    <strong>Tutores:</strong> Dar seguimiento a egresados de su carrera.
                </div>
            </div>

            <div class="feature-item">
                <span class="feature-icon">🛠️</span>
                <div class="feature-content">
                    <strong>Administradores:</strong> Gestionar usuarios y estadísticas.
                </div>
            </div>
        </div>
    </section>

    {{-- BLOQUE DE LLAMADA A LA ACCIÓN FINAL --}}
    <section class="final-cta-section">
        <div class="final-cta-content">
            <h2 class="final-cta-title">¿Listo para impulsar tu carrera?</h2>
            <p class="final-cta-description">
                Únete a la red de egresados más exitosa y descubre las oportunidades que te están esperando.
            </p>
            <div class="final-cta-buttons">
                <a href="{{ route('login') }}" class="btn btn-primary btn-large">Ingresar al Sistema</a>
            </div>
        </div>
    </section>
</div>
@endsection