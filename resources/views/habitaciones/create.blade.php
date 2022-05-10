@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="{{ asset('css/habitaciones/create.css') }}">


<div class="contenedor">
    <h1>Crear habitacion</h1>

    <form action="">

    <div class="formulario-inputs">
            <label for="numInput" id="numLabel"> Habitacion </label>
            <input type="number" id="numInput" name="num_habitacion" value="{{ old('num_habitacion') }}">
            <img src="{{ asset('img/check-mark-svgrepo-com (1).svg') }}" id="passwordCheck" class="check">
        </div>
        @error('password')
                <small>*{{ $message }}*</small>
        @enderror
        
    </form>


</div>



@endsection