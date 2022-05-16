@extends('layouts.app')



@section('content')

<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<!-- <div class="container"> -->
    <!-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                 <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                     {{ auth()->user() }} -->

                <!--    
                </div>
            </div> --><!--
        </div>
    </div> -->
    <h2>Inicio</h2>

            <section class="section">
                <h3>Habitaciones</h3>

                @foreach( $habitaciones as $habitacion )
            
        
                

                    
                    @if( $habitacion->estado == 'libre')
                        {{ $libre =  $libre + 1 }}


                    @endif
                    @if( $habitacion->estado == 'ocupado')
                       {{$ocupado = $ocupado + 1}}


                    @endif
                    @if( $habitacion->estado == 'limpieza')
                        {{$limpieza = $limpieza + 1}}


                    @endif
                    @if( $habitacion->estado == 'fuera')
                        {{$fuera = $fuera + 1}}


                    @endif

                    {{ $total = $total + 1 }}

                    @endforeach

                
                
                

                    
                    


                

                <div class="contenedor">
                    <div class="cuadros estado-libre">
                        <p>{{ $libre }}</p>
                        <p>Estado: <span>Libre</span></p>
                    </div>

                    <div class="cuadros estado-ocupada">
                        <p>{{ $ocupado }}</p>
                        <p>Estado: <span>Ocupada</span></p> 
                    </div>

                    <div class="cuadros estado-fuera">
                        <p>{{$fuera}}</p>
                        <p>Estado: <span>Fuera de servicio</span></p> 
                    </div>

                    <div class="cuadros estado-limpieza">
                        <p>{{$limpieza}}</p>
                        <p>Estado: <span>Limpieza</span></p> 
                    </div>

                    <div class="cuadros estado-total">
                        <p>{{$total}}</p>
                        <p>Habitaciones totales</p> 
                    </div>  

                </div>
                
                
                
            </section>

            
            <section class="section">
                <h3>Clientes</h3>

                <div class="contenedor">

                @foreach($clientes as $cliente)
                    <div class="cuadros visualizar">
                        <p>{{$cliente->nombres.' '.$cliente->apellidos}}</p>
                        <p>hospedaje</p>
                        <div class="lateral">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right" width="35" height="60" viewBox="0 0 24 24" stroke-width="3" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <polyline points="9 6 15 12 9 18" />
                            </svg>
                        </div>
                    </div>

                @endforeach

                      
                </div>
                
            </section>

            <section class="section">
                <h3>Eventos</h3>
                
                <div class="contenedor-eventos">

                    <div class="contenedor-evento visualizar-evento">
                        <h4>15 años de Diana</h4>

                        <div class="datos-evento">
                            <div class="datos-eventos">
                                <p>Fecha: <span>9 de diciembre 2021</span></p>    
                            </div>
                            
                            <div class="datos-eventos">
                                <p>Horario: <span>8 PM - 2 AM</span></p>
                            </div>
                            
                            <div class="datos-eventos">
                                <p>Numero de personas: <span>20-30</span></p>
                            </div>

                            <div class="datos-eventos">
                                <p>Responsable: <span>Carlos Fernando</span></p>
                            </div>
                            <div class="lateral-eventos">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right" width="50" height="105" viewBox="0 0 24 24" stroke-width="3" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <polyline points="9 6 15 12 9 18" />
                                </svg>
                            </div>
                        </div>
                        
                    </div>

                    <div class="contenedor-evento visualizar-evento">
                        <h4>15 años de Diana</h4>

                        <div class="datos-evento">
                            <div class="datos-eventos">
                                <p>Fecha: <span>9 de diciembre 2021</span></p>    
                            </div>
                            
                            <div class="datos-eventos">
                                <p>Horario: <span>8 PM - 2 AM</span></p>
                            </div>
                            
                            <div class="datos-eventos">
                                <p>Numero de personas: <span>20-30</span></p>
                            </div>

                            <div class="datos-eventos">
                                <p>Responsable: <span>Carlos Fernando</span></p>
                            </div>
                            <div class="lateral-eventos">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right" width="50" height="105" viewBox="0 0 24 24" stroke-width="3" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <polyline points="9 6 15 12 9 18" />
                                </svg>
                            </div>

                        </div>
                        
                    </div>
                        
                </div>
                        
            </section>
@endsection




