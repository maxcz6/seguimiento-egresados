@extends('layouts.tutor')

@section('content')
    <div class="content">
        <h1>Bienvenido Tutor, {{ Auth::user()->usuario }}</h1>
        <p>Este es tu panel de seguimiento de egresados.</p>

        <section style="margin-top:20px;">
            <h2>Accesos rápidos</h2>
            <ul class="quick-links">
                <li><a href="#" class="quick-link">🎓 Ver Egresados</a></li>
                <li><a href="#" class="quick-link">📊 Reportes Académicos</a></li>
                <li><a href="#" class="quick-link">📝 Encuestas</a></li>
            </ul>
        </section>
    </div>
@endsection
