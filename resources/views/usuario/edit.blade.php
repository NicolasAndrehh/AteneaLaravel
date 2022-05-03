@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="{{ asset('css/modal.css') }}">
<section class="modal Usuario modal--show">
    <section class="modalfondo">
        <h1>Modificar usuario</h1>
        
        <form action="{{ url('/usuario/'.$usuario->id) }}" method="POST" id="formulario" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}
        <p style="display: none">{{ $fotoEdit = asset('storage').'/'.$usuario->foto }}</p>

            @include('usuario.form')
            
        </form>
            
    </section>
</section>
<script src="{{ asset('js/main.js') }}"></script>

@endsection