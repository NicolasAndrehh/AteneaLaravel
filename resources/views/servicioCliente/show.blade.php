@extends('layouts.app')
@section('content')


<link rel="stylesheet" href="{{ asset('css/cliente.css') }}">

<section class="section">
    <div class="contenedor">
        <h1>{{ $cliente->id.'. '.$cliente->nombres.' '.$cliente->apellidos }}</h1>
        <hr class="hr">
        <div class="informacion">
            <p>Numero de documento: <span>{{ $cliente->num_documento }}</span></p>
            <p>Lugar de procedencia: <span>{{ $cliente->procedencia }}</span></p>
            <p>Telefono: <span>{{ $cliente->telefono }}</span></p>
            <p>Correo: <span>{{ $cliente->email }}</span></p>
            <p>Estado: <span>Activo</span></p>
            <p>Fecha de registro: <span>{{ $cliente->created_at }}</span></p>

        </div>
        <hr class="hr">      
        
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Servicio tomado</th>
                <th scope="col">Fecha de entrada</th>
                <th scope="col">Fecha de salida</th>
                <th scope="col">Valor del servicio</th>
                <th scope="col">Pago recibido</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>

            <tbody>
                @if (isset($hospedajes))
                    
                @foreach ($hospedajes as $hospedaje)
                <tr>
                    <td>Hospedaje</td>
                    <td>{{ $hospedaje->fechaInicio }}</td>
                    <td>{{ $hospedaje->fechaFin }}</td>
                    <td>{{ $hospedaje->valorTotal }}</td>
                    <td>{{ $hospedaje->pagosRecibidos }}</td>
                    <td>
                        <div class="acciones-show">
                            <a href="{{ url('/hospedaje/'.$hospedaje->id) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="22" height="22" viewBox="0 0 24 24" stroke-width="3.2" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <circle cx="10" cy="10" r="7" />
                                    <line x1="21" y1="21" x2="15" y2="15" />
                                </svg>
                            </a>
                            <a href="{{ url('/hospedaje/'.$hospedaje->id.'/edit') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="22" height="22" viewBox="0 0 24 24" stroke-width="2.7" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" />
                                    <line x1="13.5" y1="6.5" x2="17.5" y2="10.5" />
                                </svg>
                            </a>
                            <form action="{{ url('/hospedaje/'.$hospedaje->id) }}" method="POST">
                                @csrf
                                {{ method_field('DELETE') }}
                                
                                <button type="submit" onclick="return confirm('¿Seguro que quieres borrar el hospedaje {{ $hospedaje->id }}?')" style="background: none; border: none; cursor: pointer;">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-minus" width="22" height="22" viewBox="0 0 24 24" stroke-width="2.8" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <circle cx="12" cy="12" r="9" />
                                        <line x1="9" y1="12" x2="15" y2="12" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
                @else
                    <tr>
                        <td colspan="8">Este cliente no ha tomado ningun servicio</td>
                    </tr>
                @endif
                
                @if (isset($servicios))
                    
                @foreach ($servicios as $servicio)
                <tr>
                    @if ($servicio->servicioId == 2)
                        <td>Piscina</td>    
                    @elseif ($servicio->servicioId == 3)
                        <td>Restaurante</td>    
                    @elseif ($servicio->servicioId == 4)
                        <td>Salon de eventos</td>    
                    @else
                        <td>Servicio no registrado</td>    
                    @endif
                    <td>{{ $servicio->created_at }}</td>
                    <td>No registrado</td>
                    <td>{{ $servicio->valorTotal }}</td>
                    <td>{{ $servicio->pagosRecibidos }}</td>
                    <td>
                        <div class="acciones-show">
                            <a href="{{ url('/servicio/'.$servicio->id) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="22" height="22" viewBox="0 0 24 24" stroke-width="3.2" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <circle cx="10" cy="10" r="7" />
                                    <line x1="21" y1="21" x2="15" y2="15" />
                                </svg>
                            </a>
                            <a href="{{ url('/servicio/'.$servicio->id.'/edit') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="22" height="22" viewBox="0 0 24 24" stroke-width="2.7" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" />
                                    <line x1="13.5" y1="6.5" x2="17.5" y2="10.5" />
                                </svg>
                            </a>
                            <form action="{{ url('/servicio/'.$servicio->id) }}" method="POST">
                                @csrf
                                {{ method_field('DELETE') }}
                                
                                <button type="submit" onclick="return confirm('¿Seguro que quieres borrar el servicio {{ $servicio->id }}?')" style="background: none; border: none; cursor: pointer;">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-minus" width="22" height="22" viewBox="0 0 24 24" stroke-width="2.8" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <circle cx="12" cy="12" r="9" />
                                        <line x1="9" y1="12" x2="15" y2="12" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
                @else
                    <tr>
                        <td colspan="8">Este cliente no ha tomado ningun servicio</td>
                    </tr>
                @endif
            </tbody>
            
        </table>
        
    </div>
    <div class="contenedor-botones-main">
        <a class="boton " href="{{ url('/cliente') }}">Volver</a>
        <a class="boton" href="/Atenea-Software/Interfaces terminadas/Interfaces terminadas/empleados/Reporte empleados/iFrame/ReporteUsuarioRol.html">Generar reporte</a>
    </div>
</section>

<script src="{{ asset('js/main.js') }}"></script>
@endsection
