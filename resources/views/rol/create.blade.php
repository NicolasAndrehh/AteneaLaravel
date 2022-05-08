@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/modal.css') }}">

<div class="modal modal--show">
    <div class="principal-form">

        <div class="titulo">
            <h2>Crear rol</h2>
        </div>

        <form action="{{ url('rol') }}" method="POST" id="formulario" enctype="multipart/form-data">
        @csrf
    
            @include('rol.form')
                
        </form>

    </div>
</div>

@endsection