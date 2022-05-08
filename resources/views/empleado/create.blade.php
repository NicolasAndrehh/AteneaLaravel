@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="{{ asset('css/modal.css') }}">
<link rel="stylesheet" href="{{ asset('css/header.css') }}">
<link rel="stylesheet" href="{{ asset('css/empleados.css') }}">

@include('layouts.fondo')

<section class="modal modal--show">
    <section class="modalfondo">
        <h1>Registrar empleado</h1>                  
            <form action="{{ url('empleado') }}" method="POST" id="formulario" enctype="multipart/form-data">
            @csrf
                @include('empleado.form')

            </form>                  
    </section>
</section>
<script src="{{ asset('js/main.js') }}"></script>
@endsection