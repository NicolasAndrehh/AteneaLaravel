@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="{{ asset('css/empleados.css') }}">
<div class="barra-buscadora">
<form class="searchForm" action="{{ url('/empleado') }}">
    <div class="search-container">
        <input type="text" placeholder="Search.." name="search">
        <button type="submit"><i class="fa fa-search"></i></button>
    </div>
    </form>
</div>

<section class="section">
    <div class="contenedor">
        @foreach ($empleados as $empleado)

        <div class="cuadros barra-lateral">
            <p>{{ $empleado->nombres.' '.$empleado->apellidos }}</p>
            <p>{{ $empleado->cargo }}</p>
            <div class="lateral">
                <div class="tamaño-iconos">
                    <a href="{{ url('/empleado/'.$empleado->id) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="22" height="22" viewBox="0 0 24 24" stroke-width="2.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <circle cx="10" cy="10" r="7" />
                            <line x1="21" y1="21" x2="15" y2="15" />
                        </svg>
                    </a>
                </div>
                @if($adminemple || $editemple)
                <div class="tamaño-iconos">
                    <a href="{{ url('/empleado/'.$empleado->id.'/edit') }}" class="abrirModalModificar">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="22" height="22" viewBox="0 0 24 24" stroke-width="2.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" />
                            <line x1="13.5" y1="6.5" x2="17.5" y2="10.5" />
                        </svg>
                    </a>
                </div>
                @endif
                @if($adminemple)
                <div class="tamaño-iconos">
                    <form action="{{ url('/empleado/'.$empleado->id) }}" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}

                        <button type="submit" onclick="return confirm('¿Seguro que quieres borrar al empleado {{ $empleado->nombres.' '.$empleado->apellidos }}?')" style="background: none; border: none; cursor: pointer;">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-minus" width="22" height="22" viewBox="0 0 24 24" stroke-width="2.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <circle cx="12" cy="12" r="9" />
                                <line x1="9" y1="12" x2="15" y2="12" />
                            </svg>
                        </button>
                    </form>
                </div>
                @endif
            </div>
        </div>
        @endforeach
    </div>


    <div class="contenedor-botones-main">
        @if($adminemple || $editemple)
        <a class="boton " href="{{ url('/empleado/create') }}">Registrar empleado</a>
        <a class="boton" href="{{ url('/empleado/pdf') }}">Generar reporte</a>
        @endif
    </div>
</section>

<script src="{{ asset('js/main.js') }}"></script>
@endsection
