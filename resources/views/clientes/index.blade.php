@extends('layouts.app')
@section('content')


<link rel="stylesheet" href="{{ asset('css/cliente.css') }}">

<section class="section">
    <div class="contenedor">
        <table class="table">
            <thead class="thead-dark">
                <th colspan="13">
                    <div class="barra-buscadora">
                    <form class="searchForm" action="{{ url('/cliente') }}">
                        <div class="search-container">
                            <input type="text" placeholder="Search.." name="search">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </div>
                        </form>
                    </div>
                    <hr>
                </th>
              <tr>
                <th scope="col">Indice</th>
                <th scope="col">Numero de documento</th>
                <th scope="col">Nombres</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Lugar de procedencia</th>
                <th scope="col">Telefono</th>
                <th scope="col">Correo</th>
                {{-- <th scope="col">Habitacion</th>
                <th scope="col">Hora de llegada</th>
                <th scope="col">Fecha de entrada</th>
                <th scope="col">Fecha de salida</th>
                <th scope="col">Atendido por</th> --}}
                <th scope="col">Acciones</th>
              </tr>
            </thead>

            <tbody>
                @foreach ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->id }}</td>
                    <td>{{ $cliente->num_documento }}</td>
                    <td>{{ $cliente->nombres }}</td>
                    <td>{{ $cliente->apellidos }}</td>
                    <td>{{ $cliente->procedencia }}</td>
                    <td>{{ $cliente->telefono }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>
                        <div class="acciones">
                        @if($admincli || $showcli)
                            <a href="{{ url('/servicioCliente/'.$cliente->id) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="22" height="22" viewBox="0 0 24 24" stroke-width="3.2" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <circle cx="10" cy="10" r="7" />
                                    <line x1="21" y1="21" x2="15" y2="15" />
                                </svg>
                            </a>
                            @endif
                            @if($admincli || $editcli)
                            <a href="{{ url('/cliente/'.$cliente->id.'/edit') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="22" height="22" viewBox="0 0 24 24" stroke-width="2.7" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" />
                                    <line x1="13.5" y1="6.5" x2="17.5" y2="10.5" />
                                </svg>
                            </a>
                            @endif
                            <a href="{{ url('servicioCliente/create') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square-plus" width="22" height="22" viewBox="0 0 24 24" stroke-width="2.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <rect x="4" y="4" width="16" height="16" rx="2" />
                                    <line x1="9" y1="12" x2="15" y2="12" />
                                    <line x1="12" y1="9" x2="12" y2="15" />
                                </svg>
                            </a>
                            @if($admincli || $editcli)
                            <form action="{{ url('/cliente/'.$cliente->id) }}" method="POST">
                                @csrf
                                {{ method_field('DELETE') }}

                                <button type="submit" class="eliminar" onclick="return confirm('¿Seguro que quieres borrar al usuario {{ $cliente->nombres.' '.$cliente->apellidos }}?')" style="background: none; border: none; cursor: pointer;">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-minus" width="22" height="22" viewBox="0 0 24 24" stroke-width="2.8" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <circle cx="12" cy="12" r="9" />
                                        <line x1="9" y1="12" x2="15" y2="12" />
                                    </svg>
                                </button>
                            </form>
                            @endif

                        </td>
                    </div>
                </tr>
                @endforeach
            </tbody>

        </table>
        <div class="paginando">
                {{ $clientes->links("pagination::bootstrap-4") }}
                </div>

    </div>
    <div class="contenedor-botones-main">
        @if (isset($_GET['search']))
            <a href="{{ url('/cliente') }}" class="boton">Ver todos</a>
            @else
            <a href="{{ url('/cliente?search=') }}" class="boton">Ver todos</a>
        @endif

        @if($admincli)
        <a class="boton " href="{{ url('/cliente/create') }}">Registrar cliente</a>
        <a class="boton" href="{{ url('/cliente/pdf') }}">Generar reporte</a>
        @endif
    </div>
</section>

<script src="{{ asset('js/main.js') }}"></script>
@endsection
