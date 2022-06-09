<div class="contenedor-modal">

    <div class="contenedor-info-cliente">

        <div class="formulario-inputs">
            <label for="num_documento" id="documentoLabel" class="label">Documento cliente: </label>
            <input type="number" id="documentoInput" name="num_documento" value="{{ isset($cliente->num_documento)?$cliente->num_documento:old('num_documento') }}">
            <img src="{{ asset('img/check-mark-svgrepo-com (1).svg') }}" id="documentoCheck" class="check">
        </div>
        @error('num_documento')
                <small>*{{ $message }}*</small>
        @enderror

        <div class="formulario-inputs">
            <label for="habitacion" id="habitacionLabel" class="label">Habitacion: </label>
            <input type="number" id="habitacionInput" name="habitacion" value="{{ isset($hospedaje->habitacionId)?$hospedaje->habitacionId:old('habitacion') }}">
            <img src="{{ asset('img/check-mark-svgrepo-com (1).svg') }}" id="habitacionCheck" class="check">
        </div>
        @error('habitacion')
                <small>*{{ $message }}*</small>
        @enderror

        <div class="formulario-inputs">
            <label for="fechaInicio" id="fechaInicioLabel" class="label">Fecha Inicio: </label>
            <input type="date" id="fechaInicioInput" name="fechaInicio" value="{{ isset($hospedaje->fechaInicio)?$hospedaje->fechaInicio:old('fechaInicio') }}">
            <img src="{{ asset('img/check-mark-svgrepo-com (1).svg') }}" id="fechaInicioCheck" class="check">
        </div>
        @error('fechaInicio')
                <small>*{{ $message }}*</small>
        @enderror
        
        <div class="formulario-inputs">
            <label for="fechaFin" id="fechaFinLabel" class="label">Fecha Fin: </label>
            <input type="date" id="fechaFinInput" name="fechaFin" value="{{ isset($hospedaje->fechaFin)?$hospedaje->fechaFin:old('fechaFin') }}">
            <img src="{{ asset('img/check-mark-svgrepo-com (1).svg') }}" id="fechaFinCheck" class="check">
        </div>
        @error('fechaFin')
                <small>*{{ $message }}*</small>
        @enderror

        <div class="formulario-inputs">
            <label for="num_personas" id="num_personasLabel" class="label">Numero de personas: </label>
            <input type="number" id="num_personasInput" name="num_personas" value="{{ isset($hospedaje->numPersonas)?$hospedaje->numPersonas:old('num_personas') }}">
            <img src="{{ asset('img/check-mark-svgrepo-com (1).svg') }}" id="num_personasCheck" class="check">
        </div>
        @error('num_personas')
                <small>*{{ $message }}*</small>
        @enderror

        <div class="formulario-inputs">
            <label for="pago" id="pagoLabel" class="label">Pago: </label>
            <input type="number" id="pagoInput" name="pago" value="{{ isset($hospedaje->pagosRecibidos)?$hospedaje->pagosRecibidos:old('pago') }}">
            <img src="{{ asset('img/check-mark-svgrepo-com (1).svg') }}" id="pagoCheck" class="check">
        </div>
        @error('pago')
                <small>*{{ $message }}*</small>
        @enderror

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
