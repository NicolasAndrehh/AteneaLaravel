<link rel="stylesheet" href="{{ asset('css/modal.css') }}">
<section class="modal modalRegistrar">
                <section class="modalfondo">
                    <h1>Registrar empleado</h1>
                    
                    <form action="{{ url('empleado') }}" method="POST" id="formularioRegistrar" enctype="multipart/form-data">
                    @csrf

                        <div class="contenedor-modal">

                            <div class="contenedor-info">
                                
                                <div class="formulario-inputs">
                                    <label for="nombresInputRegistrar" id="nombresLabelRegistrar">Nombres:</label>
                                    <input type="text" id="nombresInputRegistrar" name="nombres" value="{{ old('nombres') }}">
                                    <img src="{{ asset('img/check-mark-svgrepo-com (1).svg') }}" id="nombresCheckRegistrar" class="check">
                                </div>
                                @error('nombres')
                                    <small>*{{ $message }}*</small>
                                @enderror
            
                                <div class="formulario-inputs">
                                    <label for="apellidosInputRegistrar" id="apellidosLabelRegistrar">Apellidos:</label>
                                    <input type="text" id="apellidosInputRegistrar" name="apellidos" value="{{ old('apellidos') }}">
                                    <img src="{{ asset('img/check-mark-svgrepo-com (1).svg') }}" id="apellidosCheckRegistrar" class="check">
                                </div>
                                @error('apellidos')
                                    <small>*{{ $message }}*</small>
                                @enderror
            
                                <div class="formulario-inputs">
                                    <label for="documentoInputRegistrar" id="documentoLabelRegistrar">Documento:</label>
                                    <input type="text" id="documentoInputRegistrar" name="num_documento" value="{{ old('documento') }}">
                                    <img src="{{ asset('img/check-mark-svgrepo-com (1).svg') }}" id="documentoCheckRegistrar" class="check">
                                </div>
                                @error('num_documento')
                                    <small>*{{ $message }}*</small>
                                @enderror
                                
                                <div class="formulario-inputs">
                                    <label for="direccionInputRegistrar" id="direccionLabelRegistrar">Direccion:</label>
                                    <input type="text" id="direccionInputRegistrar" name="direccion" value="{{ old('direccion') }}">
                                    <img src="{{ asset('img/check-mark-svgrepo-com (1).svg') }}" id="direccionCheckRegistrar" class="check">
                                </div>
                                @error('direccion')
                                    <small>*{{ $message }}*</small>
                                @enderror

                                <div class="formulario-inputs">
                                    <label for="telefonoInputRegistrar" id="telefonoLabelRegistrar">Telefono:</label>
                                    <input type="tel" id="telefonoInputRegistrar" name="telefono" value="{{ old('telefono') }}">
                                    <img src="{{ asset('img/check-mark-svgrepo-com (1).svg') }}" id="telefonoCheckRegistrar" class="check">
                                </div>
                                @error('telefono')
                                    <small>*{{ $message }}*</small>
                                @enderror

                                <div class="formulario-inputs">
                                    <label for="cargoInputRegistrar" id="cargoLabelRegistrar">Cargo:</label>
                                    <input type="text" id="cargoInputRegistrar" name="cargo" value="{{ old('cargo') }}">
                                    <img src="{{ asset('img/check-mark-svgrepo-com (1).svg') }}" id="cargoCheckRegistrar" class="check">
                                </div>
                                @error('cargo')
                                    <small>*{{ $message }}*</small>
                                @enderror
            
                                <div class="formulario-inputs">
                                    <label for="contrato">Contrato:</label>
                                    <input type="file" name="contrato" id="contrato">
                                </div>
                                @error('contrato')
                                    <small>*{{ $message }}*</small>
                                @enderror
                            
                            </div>
                            
                            <div class="foto">
                                <img src="{{ asset('img/therock.gif') }}">
                                <label for="foto" class="boton">Cambiar Foto</label>
                                <input type="file" name="foto" id="foto">
                                {{-- <a class="boton" href="">Cambiar foto</a> --}}
                                @error('foto')
                                        <small>*{{ $message }}*</small>
                                @enderror
                            </div>
                        </div>
            
                        <div class="contenedor-botones-modal">
                            <a class="boton cerrarModalRegistrar" href="" style="margin-left: -0.8rem;">Cancelar</a>
                            <input type="submit" class="boton" id="submitRegistrar" value="Registrar empleado">
                        </div>


                    </form>
                    
                </section>
                
            </section>