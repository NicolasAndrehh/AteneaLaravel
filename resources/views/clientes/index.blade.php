@extends('layouts.app')
@section('content')


<link rel="stylesheet" href="{{ asset('css/cliente.css') }}">

<section class="section">
    <div class="contenedor">
        <table class="table">
            <thead class="thead-dark">
                <th colspan="13">
                    <div class="barra-buscadora">
                        <div class="search-container">
                            <input type="text" placeholder="Search.." name="search">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </div>
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
                <th scope="col">Habitacion</th>
                <th scope="col">Hora de llegada</th>
                <th scope="col">Fecha de entrada</th>
                <th scope="col">Fecha de salida</th>
                <th scope="col">Atendido por</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>@mdo</td>
                <td>@mdo</td>
                <td>nicolasolaya22@gmail,com</td>
                <td>@mdo</td>
                <td>@mdo</td>
                <td>@mdo</td>
                <td>@mdo</td>
                <td>@mdo</td>
                <td>@mdo</td>
              </tr>
              <tr>
                <td>1</td>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>@mdo</td>
                <td>@mdo</td>
                <td>@mdo</td>
                <td>@mdo</td>
                <td>@mdo</td>
                <td>@mdo</td>
                <td>@mdo</td>
                <td>@mdo</td>
                <td>@mdo</td>
              </tr>   
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