@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/modal.css') }}">

<div class="modal modal--show">
    <div class="principal-form">

        <div class="titulo">
            <h2>Nombre del rol: {{ $rol->nombreRol }}</h2>
        </div>
        
        <section class="section">
            <h3>Privilegios</h3>

            <div class="contenedor-form">
                
                @foreach ($privilegios as $privilegio)
                    <p>-{{ $privilegio->nombrePrivilegio }}</p>
                @endforeach
                
            </div>
            </section>

        <div class="contenedor-botones-modal-rol-show">
            <a class="boton cerrarModalVisualizar" href="{{ url('/rol') }}">Cerrar</a>
            <a class="boton" href="{{ url('/rol/'.$rol->id.'/edit') }}">Modificar</a>
        </div>
    </div>
</div>

@endsection