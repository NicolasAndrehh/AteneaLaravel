@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="{{ asset('css/modal.css') }}">
<section class="modal Usuario modal--show">
    <section class="modalfondo">
        <h1>Registrar usuario</h1>
        
        <form action="{{ url('usuario') }}" method="POST" id="formulario" enctype="multipart/form-data">
        @csrf

            @include('usuario.form')
            
        </form>
            
    </section>
</section>
<script src="{{ asset('js/main.js') }}"></script>

@endsection