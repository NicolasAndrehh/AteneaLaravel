<div class="contenedor-modal">

    <div class="contenedor-info-cliente gap">

        <a href="{{ url('/hospedaje/create') }}" class="servicio">
            <div class="cuadros">
                <p>Hospedaje</p>
            </div>
        </a>
        <a href="{{ url('/servicio/create') }}" class="servicio">
            <div class="cuadros">
                <p>Piscina</p>
            </div>
        </a>
        <a href="{{ url('/servicio/create') }}" class="servicio">
            <div class="cuadros">
                <p>Restaurante</p>
            </div>
        </a>
        <a href="{{ url('/servicio/create') }}" class="servicio">
            <div class="cuadros">
                <p>Salon de eventos</p>
            </div>
        </a>

    </div>
</div>

<div class="contenedor-botones-modal">
    <a class="boton" href="{{ url('/cliente') }}" style="margin-left: -0.8rem;">Cancelar</a>
</div>
