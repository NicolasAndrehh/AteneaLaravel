<div class="contenedor-modal">

    <div class="contenedor-info">

        <div class="formulario-inputs">
            <label for="name" id="nombresLabel">Usuario: </label>
            <input type="text" id="nombresInput" name="name" value="{{ isset($usuario->name)?$usuario->name:old('name') }}">
            <img src="{{ asset('img/check-mark-svgrepo-com (1).svg') }}" id="nombresCheck" class="check">
        </div>
        @error('nombreUsuario')
                <small>*{{ $message }}*</small>
        @enderror

        <div class="formulario-inputs">
            <label for="email" id="emailLabel">Correo: </label>
            <input type="text" id="emailInput" name="email" value="{{ isset($usuario->email)?$usuario->email:old('email') }}">
            <img src="{{ asset('img/check-mark-svgrepo-com (1).svg') }}" id="emailCheck" class="check">
        </div>
        @error('email')
                <small>*{{ $message }}*</small>
        @enderror

        <div class="formulario-inputs">
            <label for="num_documento" id="documentoLabel">Documento: </label>
            <input type="text" id="documentoInput" name="num_documento" value="{{ isset($empleado->num_documento)?$empleado->num_documento:old('num_documento') }}">
            <img src="{{ asset('img/check-mark-svgrepo-com (1).svg') }}" id="documentoCheck" class="check">
        </div>
        @error('num_documento')
                <small>*{{ $message }}*</small>
        @enderror

        <div class="formulario-inputs">
            <label for="password" id="passwordLabel">Contraseña: </label>
            <input type="password" id="passwordInput" name="password" value="{{ old('password') }}">
            <img src="{{ asset('img/check-mark-svgrepo-com (1).svg') }}" id="passwordCheck" class="check">
        </div>
        @error('password')
                <small>*{{ $message }}*</small>
        @enderror

        <div class="formulario-inputs">
            <label for="password2" id="password2Label">Confirmar: </label>
            <input type="password" id="password2Input" name="password2" value="{{ old('password2') }}">
            <img src="{{ asset('img/check-mark-svgrepo-com (1).svg') }}" id="password2Check" class="check">
        </div>
        @error('password2')
                <small>*{{ $message }}*</small>
        @enderror

        <div class="formulario-inputs">
            <label for="lista">Rol: </label>
            <select name="rol" id="lista">
                <option>Seleccione rol</option>
                <option value="1" {{ old('rol') == 1 ? 'selected' : '' }}>Recepcionista</option>
                <option value="2" {{ old('rol') == 2 ? 'selected' : '' }}>Administrador</option>
            </select>
        </div>

    </div>

    <div class="foto">
        <p style="display: none">{{ $fotoCreate = asset('img/cristiano-ronaldo-drinking.gif') }}</p>
        <div id="fotoPreview">

            <img src="{{ isset($fotoEdit)?$fotoEdit:$fotoCreate }}">
        </div>
        <label for="foto" class="boton">Cambiar Foto</label>
        <input type="file" name="foto" id="foto">
        {{-- <a class="boton" href="">Cambiar foto</a> --}}
        @error('foto')
                <small>*{{ $message }}*</small>
        @enderror
    </div>
</div>

<div class="contenedor-botones-modal">
    <a class="boton" href="{{ url('/usuario')  }}" style="margin-left: -0.8rem;">Cancelar</a>
    <input type="submit" class="boton" value="{{ isset($submit)?$submit:'Registrar usuario' }}">
    {{-- <a type="submit" class="boton" href=""></a> --}}
</div>
