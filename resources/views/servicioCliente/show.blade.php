@extends('layouts.app')
@section('content')


<link rel="stylesheet" href="{{ asset('css/cliente.css') }}">

<section class="section">
    <div class="contenedor">
        <table class="table">
            <thead class="thead-dark">
                <th colspan="6">
                    {{
                        $cliente->id.' - '.
                        $cliente->nombres.' '.$cliente->apellidos.' - '.
                        $cliente->num_documento.' - '.
                        $cliente->procedencia.' - '.
                        $cliente->telefono.' - '.
                        $cliente->email
                    }}
                    <hr>
                </th>
              <tr>
                <th scope="col">Habitacion</th>
                <th scope="col">Hora de llegada</th>
                <th scope="col">Fecha de entrada</th>
                <th scope="col">Fecha de salida</th>
                <th scope="col">Atendido por</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>

            <tbody>
                {{-- @foreach ($clientes as $cliente) --}}
                <tr>
                    <td>{{ $cliente->email }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td class="accioness">
                        <a href="{{ url('/cliente/'.$cliente->id.'/edit') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="22" height="22" viewBox="0 0 24 24" stroke-width="2.7" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" />
                                <line x1="13.5" y1="6.5" x2="17.5" y2="10.5" />
                            </svg>
                        </a>
                        <a href="">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square-plus" width="22" height="22" viewBox="0 0 24 24" stroke-width="2.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <rect x="4" y="4" width="16" height="16" rx="2" />
                                <line x1="9" y1="12" x2="15" y2="12" />
                                <line x1="12" y1="9" x2="12" y2="15" />
                            </svg>
                        </a>
                        <form action="{{ url('/cliente/'.$cliente->id) }}" method="POST">
                            @csrf
                            {{ method_field('DELETE') }}

                            <button type="submit" onclick="return confirm('¿Seguro que quieres borrar al usuario {{ $cliente->nombres.' '.$cliente->apellidos }}?')" style="background: none; border: none; cursor: pointer;">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-minus" width="22" height="22" viewBox="0 0 24 24" stroke-width="2.8" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <circle cx="12" cy="12" r="9" />
                                    <line x1="9" y1="12" x2="15" y2="12" />
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
                {{-- @endforeach --}}
            </tbody>

        </table>

    </div>
    <div class="contenedor-botones-main">
        <a class="boton " href="{{ url('/cliente/create') }}">Registrar cliente</a>
        <a class="boton" href="/Atenea-Software/Interfaces terminadas/Interfaces terminadas/empleados/Reporte empleados/iFrame/ReporteUsuarioRol.html">Generar reporte</a>
    </div>
</section>

<script src="{{ asset('js/main.js') }}"></script>
@endsection
