<link rel="stylesheet" href="{{ asset('css/modal.css') }}">
<section class="modal modalModificar">
                <section class="modalfondo">
                    <h1>Modificar empleado</h1>
                    
                    <form action="{{ url('empleado/') }}" method="POST" id="formularioModificar" enctype="multipart/form-data">
                    @csrf

                        <div class="contenedor-modal">

                            <div class="contenedor-info">
                                
                                <div class="formulario-inputs">
                                    <label for="nombresInputModificar" id="nombresLabelModificar">Nombres:</label>
                                    <input type="text" id="nombresInputModificar" name="nombres" value="{{ isset($empleado->nombres)?$empleado->nombres:old('nombres') }}">
                                    <img src="{{ asset('img/check-mark-svgrepo-com (1).svg') }}" id="nombresCheckModificar" class="check">
                                </div>
                                @error('nombres')
                                    <small>*{{ $message }}*</small>
                                @enderror
            
                                <div class="formulario-inputs">
                                    <label for="apellidosInputModificar" id="apellidosLabelModificar">Apellidos:</label>
                                    <input type="text" id="apellidosInputModificar" name="apellidos" value="{{ old('apellidos') }}">
                                    <img src="{{ asset('img/check-mark-svgrepo-com (1).svg') }}" id="apellidosCheckModificar" class="check">
                                </div>
                                @error('apellidos')
                                    <small>*{{ $message }}*</small>
                                @enderror
            
                                <div class="formulario-inputs">
                                    <label for="documentoInputModificar" id="documentoLabelModificar">Documento:</label>
                                    <input type="text" id="documentoInputModificar" name="num_documento" value="{{ old('documento') }}">
                                    <img src="{{ asset('img/check-mark-svgrepo-com (1).svg') }}" id="documentoCheckModificar" class="check">
                                </div>
                                @error('num_documento')
                                    <small>*{{ $message }}*</small>
                                @enderror
                                
                                <div class="formulario-inputs">
                                    <label for="direccionInputModificar" id="direccionLabelModificar">Direccion:</label>
                                    <input type="text" id="direccionInputModificar" name="direccion" value="{{ old('direccion') }}">
                                    <img src="{{ asset('img/check-mark-svgrepo-com (1).svg') }}" id="direccionCheckModificar" class="check">
                                </div>
                                @error('direccion')
                                    <small>*{{ $message }}*</small>
                                @enderror

                                <div class="formulario-inputs">
                                    <label for="telefonoInputModificar" id="telefonoLabelModificar">Telefono:</label>
                                    <input type="tel" id="telefonoInputModificar" name="telefono" value="{{ old('telefono') }}">
                                    <img src="{{ asset('img/check-mark-svgrepo-com (1).svg') }}" id="telefonoCheckModificar" class="check">
                                </div>
                                @error('telefono')
                                    <small>*{{ $message }}*</small>
                                @enderror

                                <div class="formulario-inputs">
                                    <label for="cargoInputModificar" id="cargoLabelModificar">Cargo:</label>
                                    <input type="text" id="cargoInputModificar" name="cargo" value="{{ old('cargo') }}">
                                    <img src="{{ asset('img/check-mark-svgrepo-com (1).svg') }}" id="cargoCheckModificar" class="check">
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
                            <a class="boton cerrarModalModificar" href="" style="margin-left: -0.8rem;">Cancelar</a>
                            <input type="submit" class="boton" value="Guardar cambios">
                        </div>


                    </form>
                    
                </section>
                
            </section>