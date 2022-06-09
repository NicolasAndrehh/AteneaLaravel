@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/modal.css') }}">

<div class="modal modal--show">
    <div class="principal-form">

        <div class="titulo">
            <h2>Hospedaje</h2>
        </div>
        
        <section class="section">
            <div class="contenedor-form-hospedaje">
                
                <p>Cliente: {{ $cliente->nombres.' '.$cliente->apellidos }}</p>
                <p>Habitacion: {{ $hospedaje->habitacionId }}</p>
                <p>Fecha de ingreso: {{ $hospedaje->fechaInicio }}</p>
                <p>Fecha de salida: {{ $hospedaje->fechaFin }}</p>
                <p>Dias de hospedaje: {{ $hospedaje->dias }}</p>
                <p>Numero de personas: {{ $hospedaje->numPersonas }}</p>
                <p>Valor del hospedaje: {{ $hospedaje->valorTotal }}</p>
                <p>Pago realizado: {{ $hospedaje->pagosRecibidos }}</p>
                
            </div>
        </section>

        <div class="contenedor-botones-modal-rol-show">
            <a class="boton cerrarModalVisualizar" href="{{ url('/servicioCliente/'.$cliente->id) }}">Cerrar</a>
        </div>
    </div>
</div>

@endsection