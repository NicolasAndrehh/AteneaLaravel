<div class="contenedor-modal">

    <div class="contenedor-info-cliente">

        
        <div class="formulario-inputs">
            <label for="servicio" id="servicioLabel" class="label">Servicio: </label>
            <select name="servicio" id="servicio">
                <option>Seleccione servicio</option>
                @foreach ($servicioNames as $servicioName)
                    @if ($servicioName->id == 1)
                        
                    @elseif(isset($servicio))
                        <option value="{{ $servicioName->id }}" @if( $servicioName->id === $servicio->servicioId ) selected @endif >{{ $servicioName->name }}</option>
                    @else
                    <option value="{{ $servicioName->id }}" {{ old('servicio') ==  $servicioName->id  ? 'selected' : '' }} >{{ $servicioName->name }}</option>
                        @endif
                    
                @endforeach               
            </select>
            <img src="{{ asset('img/check-mark-svgrepo-com (1).svg') }}" id="servicio" class="check">
            @error('servicio')
            <small>*{{ $message }}*</small>
            @enderror
        </div>
        
        <div class="formulario-inputs">
            <label for="num_documento" id="documentoLabel" class="label">Documento cliente: </label>
            <input type="number" id="documentoInput" name="num_documento" value="{{ isset($cliente->num_documento)?$cliente->num_documento:old('num_documento') }}">
            <img src="{{ asset('img/check-mark-svgrepo-com (1).svg') }}" id="documentoCheck" class="check">
            @error('num_documento')
                    <small>*{{ $message }}*</small>
            @enderror
        </div>

        <div class="formulario-inputs">
            <label for="pago" id="pagoLabel" class="label">Pago: </label>
            <input type="number" id="pagoInput" name="pago" value="{{ isset($servicio->pagosRecibidos)?$servicio->pagosRecibidos:old('pago') }}">
            <img src="{{ asset('img/check-mark-svgrepo-com (1).svg') }}" id="pagoCheck" class="check">
            @error('pago')
                    <small>*{{ $message }}*</small>
            @enderror
        </div>

    </div>

</div>

@if (isset($cliente))
<div class="contenedor-botones-modal">
    <a class="boton" href="{{ url('/servicioCliente/'.$cliente->id)  }}" style="margin-left: -0.8rem;">Cancelar</a>
    <input type="submit" class="boton" style="width: 18rem" value="{{ $submit }}">
    {{-- <a type="submit" class="boton" href=""></a> --}}
</div>
@else
<div class="contenedor-botones-modal">
    <a class="boton" href="{{ url('servicio')  }}" style="margin-left: -0.8rem;">Cancelar</a>
    <input type="submit" class="boton" style="width: 18rem" value="{{ $submit }}">
    {{-- <a type="submit" class="boton" href=""></a> --}}
</div>
@endif
