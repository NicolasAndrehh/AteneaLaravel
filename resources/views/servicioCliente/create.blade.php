@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="{{ asset('css/modal.css') }}">
<link rel="stylesheet" href="{{ asset('css/header.css') }}">
<link rel="stylesheet" href="{{ asset('css/cliente.css') }}">
<link rel="stylesheet" href="{{ asset('css/servicios/index.css') }}">

<section class="modal modal--show">
    <section class="modalfondo">
        <h1>Seleccione el servicio</h1>
            <form action="{{ url('cliente') }}" method="POST" id="formulario" enctype="multipart/form-data">
            @csrf
                @include('servicioCliente.form')

            </form>
    </section>
</section>
<script src="{{ asset('js/clientes.js') }}"></script>
@endsection
