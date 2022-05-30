@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="{{ asset('css/usuariosShow.css') }}">



<section class="contenedor">
    <h1>{{ Auth::user()->name }}</h1>

    <div class="contenedor-info">
        <img src="{{ asset('storage').'/'.Auth::user()->foto }}">

        <div class="informacion">
            <p>Cargo: <span>{{ $empleado->cargo }}</span></p>
            <p>Rol: <span>{{ Auth::user()->rolId }}</span></p>
            <p>Correo: <span>{{ Auth::user()->email }}</span></p>
            <p>Documento: <span>{{ $empleado->num_documento }}</span></p>
            <p>Estado: <span>Activo</span></p>
            <p>Fecha de creacion: <span>{{ Auth::user()->created_at }}</span></p>

        </div>

        <div class="contenedor-botones-main">
            <a class="boton" href="{{ url('/usuario/'.Auth::user()->id.'/edit') }}">Modificar usuario</a>

            <a class="boton" href="{{ url('/home') }}">Volver</a>
        </div>
    </div>

</section>


@endsection
