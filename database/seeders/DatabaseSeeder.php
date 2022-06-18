<?php

namespace Database\Seeders;

use App\Models\Privilegios;
use App\Models\Rol;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {



        \App\Models\Empleado::create([
            'num_documento' =>'1003519243',
            'tipo_documento' => 'C.C',
            'nombres' => 'Juan Alvarado',
            'apellidos' => 'Alvarado',
            'ciudad'=>'fusagasuga',
            'direccion' =>'cualquiera',
            'telefono'=>'3000978888',
            'correo'=>'jaalvarado342@misena.edu.co',
            'cargo'=>'admin',
            'horario'=>'estado',
            'estado'=>'horario',
            'contrato'=>'algo',
            'foto'=> 'foto',
        ]);

        \App\Models\Rol::create([
            'id'=>'1',

            'nombreRol'=>'administrador'
        ]);

        \App\Models\Rol::create([
            'id'=>'2',

            'nombreRol'=>'recepcionista'
        ]);

        // /////////////////////////////////////////////////////////

        Privilegios::create([
            'nombrePrivilegio' => 'Consultar usuarios'
        ]);

        Privilegios::create([
            'nombrePrivilegio' => 'Administrar usuarios'
        ]);

        Privilegios::create([
            'nombrePrivilegio' => 'Consultar roles'
        ]);

        Privilegios::create([
            'nombrePrivilegio' => 'Administrar roles'
        ]);

        Privilegios::create([
            'nombrePrivilegio' => 'Administrar habitaciones'
        ]);

        Privilegios::create([
            'nombrePrivilegio' => 'visualizar habitaciones'
        ]);

        //clientes

        Privilegios::create([
            'nombrePrivilegio' => 'visualizar clientes'
        ]);
        Privilegios::create([
            'nombrePrivilegio' => 'administrar clientes'
        ]);

        Privilegios::create([
            'nombrePrivilegio' => 'editar clientes'
        ]);


        //empleados

        Privilegios::create([
            'nombrePrivilegio' => 'visualizar empleados'
        ]);
        Privilegios::create([
            'nombrePrivilegio' => 'administrar empleados'
        ]);

        Privilegios::create([
            'nombrePrivilegio' => 'editar empleados'
        ]);






        //Asignar todos los privilegios al rol 1
        $privilegios = Privilegios::all();
        $rol = Rol::find(1);
        foreach ($privilegios as $privilegio) {
            \App\Models\RolPrivilegio::create([
                'rolId' => $rol->id,
                'privilegioId' => $privilegio->id,
            ]);
        }

        // asignar al rol 2
        \App\Models\RolPrivilegio::create([
            'rolId' => '2',
            'privilegioId' => '5',
        ]);



        \App\Models\User::create([
            'name'=>'Juan Alvarado',
            'email'=>'jaalvarado342@misena.edu.co',
            'empleadoId'=>'1',
            'rolId'=>'1',
            'foto'=>'foto',
            'password'=>bcrypt('123456')
        ]);


        // creando habitaciones

        \App\Models\Habitacion::create([
            'num_habitacion' =>'001',
            'descripcion'=>'la habitacion del bicho siuuu',
            'estado'=>'libre',
            'inventario'=>'inventario',
            'num_personas'=>'4',
            'foto'=>'la foto'
        ]);


        \App\Models\Habitacion::create([
            'num_habitacion' =>'002',
            'descripcion'=>'la habitacion del bicho siuuu',
            'estado'=>'libre',
            'inventario'=>'inventario',
            'num_personas'=>'4',
            'foto'=>'la foto'
        ]);



        \App\Models\Servicio::create([
            'name' =>'hospedaje',
            'horario' =>'archivo adjunto',
            'estado' => 'activo',
            'foto'=> ' una foto',
            'aforo'=>4,
        ]);


        \App\Models\Habitacion::factory(15)->create();
        \App\Models\Empleado::factory(15)->create();
        \App\Models\Cliente::factory(20)->create();

         \App\Models\User::factory(10)->create();


        // Privilegios::factory(20)->create();








    }
}
