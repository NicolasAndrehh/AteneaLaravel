@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="{{ asset('css/habitaciones/create.css') }}">


<div class="contenedor">
    <h1 class="titulo">Crear habitacion</h1>
    <div class="contenedor-formulario">


        <form class="formulario" id="formulario" action="{{route('habitacion.store')}}" method="POST"  enctype="multipart/form-data">
        @csrf
            
            <div class="parte1">
                <div class="formulario-inputs">
                        <label for="numInput" id="numLabel"> Habitacion </label>
                        <input type="number" id="numInput" name="num_habitacion" value="{{ old('num_habitacion') }}">
                        <img src="{{ asset('img/check-mark-svgrepo-com (1).svg') }}" id="num_habitacion_check" class="check">
                </div>
                    @error('num_habitacion')
                            <small>*{{ $message }}*</small>
                    @enderror
                


                
                


                <div class="formulario-inputs">
                        <label for="num_personas" id="perLabel"> Personas</label>
                        <input type="number" id="personasHab" name="num_personas" value="{{ old('num_personas') }}">
                        
                        <img src="{{ asset('img/check-mark-svgrepo-com (1).svg') }}" id="personasCheck" class="check">
                </div>
                @error('num_personas')
                            <small>*{{ $message }}*</small>
                    @enderror


                <div class="formulario-inputs">
                        <label for="descriHab" id="desLabel"> Descripcion </label>
                        <textarea name="descripcion" id="descripHab" cols="28" rows="5" class="" value=" {{ old('descripcion') }}"></textarea>
                        <img src="{{ asset('img/check-mark-svgrepo-com (1).svg') }}" id="desCheck" class="check">
                </div>
                    @error('descripcion')
                            <small>*{{ $message }}*</small>
                    @enderror

                   
                    <h2>Estado</h2>
                    <div class="estados-contenedor">
                        <div class="cuadros estado-libre">
                            <label for="" class="content-input">
                                <input type="radio" name="estado" value="libre">Libre
                                <i></i>
                            </label>
                        </div>

                        <div class="cuadros estado-ocupado" name="estado">
                        <label for="" class="content-input">
                                <input type="radio" name="estado" value="ocupado">Ocupado
                                <i></i>
                            </label>
                        </div>
                        <div class="cuadros estado-limpieza" name="estado">
                        <label for="" class="content-input">
                                <input type="radio" name="estado" value="limpieza">Limpieza
                                <i></i>
                            </label>
                        </div>
                        <div class="cuadros estado-fuera" name="estado">
                        <label for="" class="content-input">
                                <input type="radio" name="estado" value="fuera">fuera de servicio
                                <i></i>
                            </label>
                        </div>
                </div>
                
            </div>

            <div class="parte2">



            <div class="foto">
                <p style="display: none">{{ $fotoCreate = asset('img/cristiano-ronaldo-drinking.gif') }}</p>
                <div id="fotoPreview">
                    
                    <img src="{{ isset($fotoEdit)?$fotoEdit:$fotoCreate }}">
                </div>
                <label for="foto" class="boton">Cambiar Foto</label>
                <input type="file" name="foto" id="foto" >
                
                {{-- <a class="boton" href="">Cambiar foto</a> --}}
                @error('foto')
                        <small>*{{ $message }}*</small>
                @enderror
                </div>

                <div class="inventario">
                    <label for="inventario" class="boton">Inventario</label>
                    <input type="file" name="inventario" id="inventario">
                    {{-- <a class="boton" href="">Inventario</a> --}}
                </div>
                @error('inventario')
                <small>*{{ $message }}*</small>
                @enderror


                <div class="contenedor-botones-create">
                    <a class="boton" href="{{ url('/habitacion') }}" style="margin-left: -0.8rem;">Cancelar</a>
                    <input type="submit" class="boton" id="submit" value="{{ $submit }}">
                </div>

                






                

            </div>

    




        
        </form>
    </div>


</div>


<script src="{{ asset('js/main.js') }}"></script>



@endsection