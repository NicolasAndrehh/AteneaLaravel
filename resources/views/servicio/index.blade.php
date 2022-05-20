@extends('layouts.app')
@section('content')


<link rel="stylesheet" href="{{ asset('css/servicios.css') }}">

<section class="section">
    <div class="contenedor derecha grid">
        <div class="estado">
            <p>Estado: <span>Disponible</span></p>
        </div>
        <div class="capacidad">
            <p>Maximo de personas</p>
            <span>10-50</span>
        </div>
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th>Dia</th>
                <th>Abierto</th>
                <th>Cierre</th>
              </tr>
            </thead>

            <tbody>
                <tr>
                    <td>Lunes</td>
                    <td>9:00 am</td>
                    <td>6:00 pm</td>
                </tr>
                <tr>
                    <td>Martes</td>
                    <td>6:00 am</td>
                    <td>6:00 pm</td>
                </tr>
                <tr>
                    <td>Miercoles</td>
                    <td>6:00 am</td>
                    <td>6:00 pm</td>
                </tr>
                <tr>
                    <td>Jueves</td>
                    <td>6:00 am</td>
                    <td>6:00 pm</td>
                </tr>
                <tr>
                    <td>Viernes</td>
                    <td>9:00 am</td>
                    <td>6:00 pm</td>
                </tr>
                <tr>
                    <td>Sabado</td>
                    <td>6:00 am</td>
                    <td>6:00 pm</td>
                </tr>
                <tr>
                    <td>Domingo</td>
                    <td>6:00 am</td>
                    <td>6:00 pm</td>
                </tr>
            </tbody>
        </table>

        <div class="contenedor-botones-main">
            <a class="boton " href="{{ url('/cliente/create') }}">Modificar servicio</a>
            <a class="boton " href="{{ url('/cliente/create') }}">Añadir cliente</a>
            <a class="boton" href="{{ url('/cliente/pdf') }}">Generar reporte</a>
        </div>
    </div>

    <div class="contenedor izquierda">
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left" width="35" height="35" viewBox="0 0 24 24" stroke-width="2.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <polyline points="15 6 9 12 15 18" />
            </svg>

            <img src="{{ asset('img/cristiano-ronaldo-drinking.gif') }}" width="15vw" height="10vh">

            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right" width="35" height="35" viewBox="0 0 24 24" stroke-width="2.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <polyline points="9 6 15 12 9 18" />
            </svg>
        </div>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Persona</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Dia solar</td>
                    <td>400K</td>
                </tr>
                <tr>
                    <td>Dia completo</td>
                    <td>500K</td>
                </tr>
            </tbody>
        </table>
    </div>


</section>

<script src="{{ asset('js/main.js') }}"></script>
@endsection
