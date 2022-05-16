@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="{{ asset('css/habitaciones/show.css') }}">

<div class="contenedor ">
                    
                    <h2 class ="titulos">Detalles Habitacion</h2>
                    <div class="primero">
                        <div class="textos">
                            <div class="numerohab"><h3>Numero: {{ $habitacion->num_habitacion}}</h3></div>
                            <div class="personas"><h3>N° personas:{{ $habitacion-> num_personas}}</h3></div>
                            
                                
                                
                            <a href="{{ asset('storage').'/'.$habitacion->inventario }}" class="boton">Inventario</a>
                            
                            <div class="descripcion">
                                <p>{{ $habitacion->descripcion}}</p>
                            </div>
                        </div>
                        <div class="imagen">
                            <img src="{{ asset('storage').'/'.$habitacion->foto }}">
                        </div>
                    </div>
                    <div class="inferiores">
                    <a class="boton" href="{{ url('/habitacion') }}">Volver</a>
                    <a class="boton" href="{{ url('/habitacion/'.$habitacion->id.'/edit') }}">Modificar </a>
                    
                    </div>
        
        
                </div>


                
                
        
            
    </div> 



@endsection