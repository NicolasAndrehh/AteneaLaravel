<div class="contenedor-modal">

    <div class="contenedor-info-cliente">

        <div class="formulario-inputs">
            <label for="nombresInput" id="nombresLabel" class="label">Nombres:</label>
            <input type="text" id="nombresInput" name="nombres" value="{{ isset($cliente->nombres)?$cliente->nombres:Old('nombres') }}">
            <img src="{{ asset('img/check-mark-svgrepo-com (1).svg') }}" id="nombresCheck" class="check">
            @error('nombres')
                <small>*{{ $message }}*</small>
            @enderror
        </div>

        <div class="formulario-inputs">
            <label for="apellidosInput" id="apellidosLabel" class="label">Apellidos:</label>
            <input type="text" id="apellidosInput" name="apellidos" value="{{ isset($cliente->apellidos)?$cliente->apellidos:old('apellidos') }}">
            <img src="{{ asset('img/check-mark-svgrepo-com (1).svg') }}" id="apellidosCheck" class="check">
            @error('apellidos')
                <small>*{{ $message }}*</small>
            @enderror
        </div>

        <div class="formulario-inputs">
            <label for="documentoInput" id="documentoLabel" class="label">Documento:</label>
            <input type="text" id="documentoInput" name="num_documento" value="{{ isset($cliente->num_documento)?$cliente->num_documento:old('num_documento') }}">
            <img src="{{ asset('img/check-mark-svgrepo-com (1).svg') }}" id="documentoCheck" class="check">
            @error('num_documento')
                <small>*{{ $message }}*</small>
            @enderror
        </div>

        <div class="formulario-inputs">
            <label for="procedenciaInput" id="procedenciaLabel" class="label">Lugar de procedencia:</label>
            <input type="text" id="procedenciaInput" name="procedencia" value="{{ isset($cliente->procedencia)?$cliente->procedencia:old('procedencia') }}">
            <img src="{{ asset('img/check-mark-svgrepo-com (1).svg') }}" id="procedenciaCheck" class="check">
            @error('procedencia')
                <small>*{{ $message }}*</small>
            @enderror
        </div>

        <div class="formulario-inputs">
            <label for="telefonoInput" id="telefonoLabel" class="label">Telefono:</label>
            <input type="tel" id="telefonoInput" name="telefono" value="{{ isset($cliente->telefono)?$cliente->telefono:old('telefono') }}">
            <img src="{{ asset('img/check-mark-svgrepo-com (1).svg') }}" id="telefonoCheck" class="check">
            @error('telefono')
                <small>*{{ $message }}*</small>
            @enderror
        </div>

        <div class="formulario-inputs">
            <label for="emailInput" id="emailLabel" class="label">Correo:</label>
            <input type="text" id="emailInput" name="email" value="{{ isset($cliente->email)?$cliente->email:old('email') }}">
            <img src="{{ asset('img/check-mark-svgrepo-com (1).svg') }}" id="emailCheck" class="check">
            @error('email')
                <small>*{{ $message }}*</small>
            @enderror
        </div>

    </div>

</div>

<div class="contenedor-botones-modal">
    <a class="boton" href="{{ url('/cliente') }}" style="margin-left: -0.8rem;">Cancelar</a>
    <input type="submit" class="boton" id="submit" value="{{ $submit }}">
</div>
