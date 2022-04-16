{{-- <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
<section class="modal">
                <section class="modalfondo">
                    <h1>{{ $modo }} empleado</h1>
                    
                    <form action="{{ url('empleado/'.isset($empleado->id)) }}" method="POST" id="formularioModal" enctype="multipart/form-data">
                    @csrf

                        <div class="contenedor-modal">

                            <div class="contenedor-info">
                                
                                <div class="formulario-inputs">
                                    <label for="nombresInput" id="nombresLabel">Nombres:</label>
                                    <input type="text" id="nombresInput" name="nombres" value="{{ isset($empleado->nombres)?$empleado->nombres:old('nombres') }}">
                                    <img src="{{ asset('img/check-mark-svgrepo-com (1).svg') }}" id="nombresCheck" class="check">
                                </div>
                                @error('nombres')
                                    <small>*{{ $message }}*</small>
                                @enderror
            
                                <div class="formulario-inputs">
                                    <label for="apellidosInput" id="apellidosLabel">Apellidos:</label>
                                    <input type="text" id="apellidosInput" name="apellidos" value="{{ old('apellidos') }}">
                                    <img src="{{ asset('img/check-mark-svgrepo-com (1).svg') }}" id="apellidosCheck" class="check">
                                </div>
                                @error('apellidos')
                                    <small>*{{ $message }}*</small>
                                @enderror
            
                                <div class="formulario-inputs">
                                    <label for="documentoInput" id="documentoLabel">Documento:</label>
                                    <input type="text" id="documentoInput" name="num_documento" value="{{ old('documento') }}">
                                    <img src="{{ asset('img/check-mark-svgrepo-com (1).svg') }}" id="documentoCheck" class="check">
                                </div>
                                @error('documento')
                                    <small>*{{ $message }}*</small>
                                @enderror
                                
                                <div class="formulario-inputs">
                                    <label for="direccionInput" id="direccionLabel">Direccion:</label>
                                    <input type="text" id="direccionInput" name="direccion" value="{{ old('direccion') }}">
                                    <img src="{{ asset('img/check-mark-svgrepo-com (1).svg') }}" id="direccionCheck" class="check">
                                </div>
                                @error('direccion')
                                    <small>*{{ $message }}*</small>
                                @enderror

                                <div class="formulario-inputs">
                                    <label for="telefonoInput" id="telefonoLabel">Telefono:</label>
                                    <input type="tel" id="telefonoInput" name="telefono" value="{{ old('telefono') }}">
                                    <img src="{{ asset('img/check-mark-svgrepo-com (1).svg') }}" id="telefonoCheck" class="check">
                                </div>
                                @error('telefono')
                                    <small>*{{ $message }}*</small>
                                @enderror

                                <div class="formulario-inputs">
                                    <label for="cargoInput" id="cargoLabel">Cargo:</label>
                                    <input type="text" id="cargoInput" name="cargo" value="{{ old('cargo') }}">
                                    <img src="{{ asset('img/check-mark-svgrepo-com (1).svg') }}" id="cargoCheck" class="check">
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
                                {{-- @error('foto')
                                        <small>*{{ $message }}*</small>
                                @enderror
                            </div>
                        </div>
            
                        <div class="contenedor-botones-modal">
                            <a class="boton cerrarModal" href="" style="margin-left: -0.8rem;">Cancelar</a>
                            <input type="submit" class="boton" value="{{ $submit }}">
                        </div>


                    </form>
                    
                </section>
                
            </section>  --}}