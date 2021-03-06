<link rel="stylesheet" href="{{ asset('css/usuariosShow.css') }}">
@extends('layouts.app')
@section('content')

<section class="contenedor">
    <h1>{{ $usuario->name }}</h1>

    <div class="contenedor-info">
        <img src="{{ asset('storage').'/'.$usuario->foto }}">

        <div class="informacion">
            <p>Cargo: <span>{{ $empleado->cargo }}</span></p>
            <p>Rol: <span>{{ $usuario->rolId }}</span></p>
            <p>Correo: <span>{{ $usuario->email }}</span></p>
            <p>Documento: <span>{{ $empleado->num_documento }}</span></p>
            <p>Estado: <span>Activo</span></p>
            <p>Fecha de creacion: <span>{{ $usuario->created_at }}</span></p>

        </div>

        <div class="contenedor-botones-main">
            <a class="boton" href="{{ url('/usuario/'.$usuario->id.'/edit') }}">Modificar usuario</a>
            <a class="boton" href="{{ url('/usuario')}}">Volver</a>
        </div>
    </div>

</section>

@endsection
