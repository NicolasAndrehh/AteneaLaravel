@include('layouts.header')
<link rel="stylesheet" href="{{ asset('css/modal.css') }}">
<section class="modal Usuario modal--show">
    <section class="modalfondo">
        <h1>Registrar usuario</h1>
        
        <form action="" id="formulario">

            <div class="contenedor-modal">

                <div class="contenedor-info">
                    
                    <div class="formulario-inputs">
                        <p id="nombresLabel">Usuario: </p>
                        <input type="text" id="nombresInput" name="nombres" required>
                        <img src="img/check-mark-svgrepo-com (1).svg" id="nombresCheck" class="check">
                    </div>

                    <div class="formulario-inputs">
                        <p id="documentoLabel">Documento: </p>
                        <input type="text" id="documentoInput" name="documento" required>
                        <img src="img/check-mark-svgrepo-com (1).svg" id="documentoCheck" class="check">
                    </div>

                    <div class="formulario-inputs">
                        <p id="passwordLabel">Contraseña: </p>
                        <input type="password" id="passwordInput" name="password" required>
                        <img src="img/check-mark-svgrepo-com (1).svg" id="passwordCheck" class="check">
                    </div>

                    <div class="formulario-inputs">
                        <p id="password2Label">Confirmar: </p>
                        <input type="password" id="password2Input" name="password2" required>
                        <img src="img/check-mark-svgrepo-com (1).svg" id="password2Check" class="check">
                    </div>

                    <div class="formulario-inputs">
                        <p>Rol: </p>
                        <select name="Rol" id="lista">
                            <option value="0">Seleccione rol</option>
                            <option value="1">Recepcionista</option>
                            <option value="2">Administrador</option>
                        </select>
                    </div>
                
                </div>
                
                <div class="foto">
                    <div id="fotoPreview">
                        
                        <img src="{{ asset('img/cristiano-ronaldo-drinking.gif') }}">
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
                <a class="boton cerrarModal" href="" style="margin-left: -0.8rem;">Cancelar</a>
                <input type="submit" class="boton" value="Registrar usuario">
                {{-- <a type="submit" class="boton" href=""></a> --}}
            </div>
            
        </form>
            
    </section>
</section>
<script src="{{ asset('js/main.js') }}"></script>
@include('layouts.footer')