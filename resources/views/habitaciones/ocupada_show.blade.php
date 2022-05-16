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
                
                <div class="tabla">
                    <table> 
                        <tr>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Documento</th>
                            <th>T. Documento</th>
                            <th>Correo</th>
                            <th>Direccion</th>
                            <th>Ciudad</th>
                        </tr>
                        <tr>
                            <td>Sandra </td>
                            <td> lozano</td>
                            <td>1007482916</td>
                            <td>C.C</td>
                            <td>sanlo@gmail.com</td>
                            <td>cra 1 occidente</td>
                            <td>fusagasuga</td>
                        </tr>
                        <tr>
                            <td>Alfonso </td>
                            <td> Rodriguez</td>
                            <td>10074854556</td>
                            <td>C.C</td>
                            <td>alforodrt@gmail.com</td>
                            <td>cra 5 occidente</td>
                            <td>fusagasuga</td>
                        </tr>
                    </table>
                </div>
                <div class="contenedor">
                <h2>Detalle reservacion</h2>
                    <div class="parte3">
                        
                        <div class="izquierda3">
                            <div class="campito">
                                <h3>Desde:</h3>
                                <input type="date">
                            </div>

                            <div class="campito">
                                <h3>Personas:</h3>
                                <input type="number">
                            </div>

                            <div class="campito">
                                <h3>valor reserva:</h3>
                                <h4>$21000</h4>
                            </div>
                        </div>
            
                            
                        <div class="derecha3">
                            <div class="campito">
                                <h3>Hasta:</h3>
                                <input type="date">
                            </div>
                            
                            <div class="campito">
                                <h3>Valor noche:</h3>
                                <h4>$21000</h4>
                            </div>
                            
                            <div class="campito">
                                <h3>Adelanto:</h3>
                                <input type="number">
                            </div>
                        </div>
                    </div>
        
        
        
                    
                </div>
                <div class="inferiores">
                <a class="boton" href="{{ url('/habitacion') }}">Volver</a>
                </div>


                
                
        
            
    </div> 



@endsection