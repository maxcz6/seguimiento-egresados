@extends('layouts.admin')

@section('content')
    <div class="content">
        <h1>Bienvenido, {{ Auth::user()->usuario }}</h1>
        <p>Este es el panel de administración del sistema de seguimiento de egresados.</p>
    </div>
@endsection
