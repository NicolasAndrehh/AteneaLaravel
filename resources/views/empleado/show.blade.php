<link rel="stylesheet" href="{{ asset('css/empleadosShow.css') }}">
@include('layouts.header')

<section class="contenedor">
    <h1>{{ $empleado->nombres.' '.$empleado->apellidos }}</h1>

    <div class="contenedor-info">
        <img src="{{ asset('storage').'/'.$empleado->foto }}">

        <div class="informacion">
            <p>Cargo: <span>{{ $empleado->cargo }}</span></p>
            <p>Documento: <span>{{ $empleado->num_documento }}</span></p>
            <p>Direccion: <span>{{ $empleado->direccion }}</span></p>
            <p>Telefono: <span>{{ $empleado->telefono }}</span></p>
            <p>Trabajando desde: <span>{{ $empleado->created_at }}</span></p>

        </div>

        <div class="contenedor-botones-main">
            <a class="boton" href="{{ url('/empleado/'.$empleado->id.'/edit') }}">Modificar empleado</a>
            <a class="boton" href="{{ url('/empleado') }}">Volver</a>
        </div>
    </div>

</section>

@include('layouts.footer')