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
                            <a href="../../resumenes/libres-resumen/contenido/marco/marco-libres-resumen.html">aaaaa</a>
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

                    
                        <div class="iframeprincipal">
                            <!-- inicio habitaciones -->
                           <div class="cuadros estado-libre">
                               <a href="../../habitacion libre/html/hab_libre.html">
                                   <p>001</p>
                                   <p>Estado:<span>Libre</span></p>
                               </a>
                   
                               <div class="tamaño-iconos lateral">
                                   <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                       <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                       <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" />
                                       <line x1="13.5" y1="6.5" x2="17.5" y2="10.5" />
                                     </svg>
                                   
                               </div>
                   
                           </div>
                        </div>
                    
                </div>
                <div class="contenedor-botones-bajos">
                    <a class="boton" href="/Atenea-Software/Interfaces terminadas/Interfaces terminadas/habitaciones/resumenes/resumen/contenido/marco/hab-resumen.html">Resumen</a>
                    <a class="boton" href="{{ url('/habitacion/create') }}">Crear Habitacion</a>
                    <a class="boton" href="../../Reporte habitaciones/html/marco-reporte-habitacion.html">Generar reporte</a>
                </div>




@endsection