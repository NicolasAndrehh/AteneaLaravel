@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="{{ asset('css/habitaciones/hab_inicio.css') }}">


                <div class="busqueda-hab">
                    <div class="barra-buscadora">
                        <div class="search-container">
                            <input type="text" placeholder="Search.." name="search">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <div class="contenedor-botones-estado">
                        <div class="botones-estado libre">
                            <a href="{{ url('/habitacion/libre') }}">aaaaa</a>
                        </div>
                        <div class="botones-estado ocupado">
                            <a href="/Atenea-Software/Interfaces terminadas/Interfaces terminadas/habitaciones/resumenes/ocupadas-resumen/contenido/marco/marco-ocupadas-resumen.html">aaaaa</a>
                        </div>
                        <div class="botones-estado limpieza">
                            <a href="/Atenea-Software/Interfaces terminadas/Interfaces terminadas/habitaciones/resumenes/limpieza-resumen/contenido/marco/marco-limpieza-resumen.html">aaaaa</a>
                        </div>
                        <div class="botones-estado fuera">
                            <a href="/Atenea-Software/Interfaces terminadas/Interfaces terminadas/habitaciones/resumenes/fuera-servicio-resumen/contenido/marco/marco-fuera-resumen.html">aaaaa</a>
                        </div>
                    </div>
                </div>


                <div class="contenedor">

                    
                        @foreach( $habitaciones as $habitacion )
                            <!-- inicio habitaciones -->
                            
                            
                            @if($habitacion->estado == 'libre')
                            <div class="cuadros estado-libre">
                            @endif
                            @if($habitacion->estado == 'fuera')
                            <div class="cuadros estado-fuera">
                            @endif
                            @if($habitacion->estado == 'limpieza')
                            <div class="cuadros estado-limpieza">
                            @endif
                            @if($habitacion->estado == 'ocupado')
                            <div class="cuadros estado-ocupado">
                            @endif

                        
                           
                               <a href="{{ url('/habitacion/'.$habitacion->id) }}">
                                   <p>{{ $habitacion->num_habitacion }}</p>
                                   <p>Estado:<span>{{ $habitacion->estado }}</span></p>
                               </a>
                               <div class="lateral">
                   
                                    <div class="tamaño-iconos">
                                            <a href="{{ url('/habitacion/'.$habitacion->id.'/edit') }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                    <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" />
                                                    <line x1="13.5" y1="6.5" x2="17.5" y2="10.5" />
                                                    </svg>
                                            </a>
                                        
                                    </div>

                                    <div class="tamaño-iconos ">
                                            <form action="{{ url('/habitacion/'.$habitacion->id) }}" method="POST">
                                            @csrf
                                            {{ method_field('DELETE') }}

                                            <button type="submit" onclick="return confirm('¿Seguro que quieres borrar la habitacion {{ $habitacion->num_habitacion }}?')" style="background: none; border: none; cursor: pointer;">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-minus" width="22" height="22" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                    <circle cx="12" cy="12" r="9" />
                                                    <line x1="9" y1="12" x2="15" y2="12" />
                                                </svg>    
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            
                           </div>

                        @endforeach
                        
                    
                </div>
                <div class="contenedor-botones-bajos">
                    <a class="boton" href="/Atenea-Software/Interfaces terminadas/Interfaces terminadas/habitaciones/resumenes/resumen/contenido/marco/hab-resumen.html">Resumen</a>
                    <a class="boton" href="{{ url('/habitacion/create') }}">Crear Habitacion</a>
                    <a class="boton" href="../../Reporte habitaciones/html/marco-reporte-habitacion.html">Generar reporte</a>
                </div>




@endsection