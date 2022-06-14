@extends('layouts.app')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.4/pagination.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.4/pagination.css"/>

<link rel="stylesheet" href="{{ asset('css/habitaciones/hab_inicio.css') }}">


                <div class="busqueda-hab">
                    <div class="barra-buscadora">
                    <form class="searchForm" action="{{ url('/habitacion') }}">
                        <div class="search-container">
                            <input type="text" placeholder="Search.." id="searchBar" name="search">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </div>
                        </form>
                    </div>
                    <div class="contenedor-botones-estado">
                        <div class="popup  botones-estado libre" onmouseover="mypopup1()">
                            <span class="popuptext" id="myPopup">Libres</span>
                        </div>
                        <div class="popup  botones-estado ocupado" onmouseover="mypopup2()">
                            <span class="popuptext" id="myPopup2">ocupado</span>
                        </div>
                        <div class="popup  botones-estado limpieza" onmouseover="mypopup3()">
                            <span class="popuptext" id="myPopup3">limpieza</span>
                        </div>
                        <div class="popup  botones-estado fuera" onmouseover="mypopup4()">
                            <span class="popuptext" id="myPopup4">fuera de servicio</span>
                        </div>
                    </div>
                </div>


                <div class="contenedor" id="container">


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
                                   <p>N° habitacion {{ $habitacion->num_habitacion }}</p>
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

                                            <button type="submit" class="eliminar" onclick="return confirm('¿Seguro que quieres borrar la habitacion {{ $habitacion->num_habitacion }}?')" style="background: none; border: none; cursor: pointer;">
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
                <div class="paginando">
                {{ $habitaciones->links("pagination::bootstrap-4") }}
                </div>
                <div class="contenedor-botones-bajos">
                   
                    <a class="boton" href="{{ url('/habitacion/create') }}">Crear Habitacion</a>
                    <a class="boton" href="../../Reporte habitaciones/html/marco-reporte-habitacion.html">Generar reporte</a>
                </div>




                <script src="{{ asset('js/habitaciones.js') }}"></script>




@endsection
