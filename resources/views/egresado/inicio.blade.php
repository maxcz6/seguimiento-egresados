@extends('layouts.egresado')

@section('content')
    <div class="content">
        <h1>Bienvenido Egresado, {{ Auth::user()->usuario }}</h1>
        <p>Este es tu panel personal.</p>

        <section style="margin-top:20px;">
            <h2>Accesos rápidos</h2>
            <ul class="quick-links">
                <li><a href="{{ route('egresado.perfil') }}" class="quick-link">👤 Mi Perfil</a></li>
                <li><a href="{{ route('egresado.encuestas') }}" class="quick-link">📝 Encuestas</a></li>
                <li><a href="{{ route('egresado.oportunidades') }}" class="quick-link">💼 Oportunidades</a></li>
            </ul>
        </section>
    </div>
@endsection
