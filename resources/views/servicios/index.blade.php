@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="{{ asset('css/servicios/index.css') }}">



                    <div class="barra-buscadora">
                    <form class="searchForm" action="{{ url('/servicio') }}">
                        <div class="search-container">
                            <input type="text" placeholder="Search.." id="searchBar" name="search">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                    </div>

            <div class="contenedor">



            @foreach($servicios as $servicio)

                @if($servicio->estado == 'activo')
                <div class="cuadros estado-activo barra-lateral">
                @endif
                @if($servicio->estado == 'inactivo')
                <div class="cuadros estado-activo barra-lateral">
                    @endif
                    
                @if ($servicio->name == 'hospedaje')

                    <a href="{{ url('/hospedaje/create') }}"><p>{{ $servicio->name }}</p></a>
                    <div class="lateral">
                        <div class="tamaño-iconos">
                            <a href="" class ="servicio">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" />
                                    <line x1="13.5" y1="6.5" x2="17.5" y2="10.5" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    
                @else
                    
                    <a href="{{ url('/servicio/create') }}"><p>{{ $servicio->name }}</p></a>
                    <div class="lateral">
                        <div class="tamaño-iconos">
                            <a href="" class ="servicio">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" />
                                    <line x1="13.5" y1="6.5" x2="17.5" y2="10.5" />
                                </svg>
                            </a>
                        </div>
                    </div>    

                @endif

                </div>
                
            @endforeach    

            </div>

        <div class="contenedor-botones">
            <a class="boton" href="">Registrar Servicio</a>
            <a class="boton" href="">Generar reporte</a>
        </div>



@endsection
