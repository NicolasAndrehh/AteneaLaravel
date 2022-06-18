
        <div class="color">
            <p>Nombre del rol: <input type="text" name="nombreRol" value="{{ isset($rol->nombreRol)?$rol->nombreRol:old('nombreRol') }}"></p>
        </div>
        
        <section class="section">
            <h3>Privilegios</h3>

            <div class="contenedor-form">

            @foreach($privilegios as $privilegio)
                <p><input type="checkbox" value="{{ $privilegio->id }}" name="privilegios[]"> {{$privilegio->nombrePrivilegio}}</p>
            @endforeach
                <!-- <p><input type="checkbox" value="editar empleados" name="privilegios[]"> editar empleados</p>
                <p><input type="checkbox" value="13" name="privilegios[]"> Eliminar Empleados</p>
                <p><input type="checkbox" value="14" name="privilegios[]"> Eliminar Clientes</p>
                <p><input type="checkbox" value="15" name="privilegios[]"> Eliminar Habitaciones</p>
                <p><input type="checkbox" value="16" name="privilegios[]"> Eliminar roles</p>
                <p><input type="checkbox" value="17" name="privilegios[]"> Eliminar Usuarios</p>
                <p><input type="checkbox" value="18" name="privilegios[]"> Ingresar Clientes</p>
                <p><input type="checkbox" value="19" name="privilegios[]"> Crear Habitaciones</p>
                <p><input type="checkbox" value="20" name="privilegios[]"> Crear Servicioss</p>
                <p><input type="checkbox" value="21" name="privilegios[]"> Crear Usuarios</p>
                <p><input type="checkbox" value="22" name="privilegios[]"> Crear Roles</p>
                <p><input type="checkbox" value="23" name="privilegios[]"> Registrar Empleados</p>
                <p><input type="checkbox" value="24" name="privilegios[]"> Reportes Servicios</p>
                <p><input type="checkbox" value="25" name="privilegios[]"> Reportes Clientes</p>  -->
            </div>
            
        </section>

        <div class="contenedor-botones-modal-rol">
            <a class="boton cerrarModalCrear" href="{{ url('/rol') }}">Cancelar</a>
            <input type="submit" class="boton" value="Crear rol">
        </div>
 