@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="{{ asset('css/modal.css') }}">
<section class="modal Usuario modal--show">
    <section class="modalfondo">
        <h1>Modificar servicio</h1>
        
        <form action="{{ url('/servicio/'.$servicio->id) }}" method="POST" id="formulario" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}

            @include('servicios.form')
            
        </form>
            
    </section>
</section>
<script src="{{ asset('js/hospedaje.js') }}"></script>

@endsection