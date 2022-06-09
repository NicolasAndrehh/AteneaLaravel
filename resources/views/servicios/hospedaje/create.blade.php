@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="{{ asset('css/modal.css') }}">
<section class="modal Usuario modal--show">
    <section class="modalfondo">
        <h1>Crear hospedaje</h1>
        
        <form action="{{ url('hospedaje') }}" method="POST" id="formulario" enctype="multipart/form-data">
        @csrf

            @include('servicios.hospedaje.form')
            
        </form>
            
    </section>
</section>
<script src="{{ asset('js/hospedaje.js') }}"></script>

@endsection