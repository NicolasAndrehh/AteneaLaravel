@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/modal.css') }}">

<div class="modal modal--show">
    <div class="principal-form">

        <div class="titulo">
            <h2>Visualizar servicio</h2>
        </div>
        
        <section class="section">
            <div class="contenedor-form-servicio">
                
                <p>Cliente: {{ $cliente->nombres.' '.$cliente->apellidos }}</p>
                <p>Servicio: {{ $servicioNombre->name }}</p>
                <p>Fecha de ingreso: {{ $servicio->created_at }}</p>
                <p>Valor del servicio: {{ $servicio->valorTotal }}</p>
                <p>Pago realizado: {{ $servicio->pagosRecibidos }}</p>
                
            </div>
        </section>

        <div class="contenedor-botones-modal-rol-show">
            <a class="boton cerrarModalVisualizar" href="{{ url('/servicioCliente/'.$cliente->id) }}">Cerrar</a>
        </div>
    </div>
</div>

@endsection