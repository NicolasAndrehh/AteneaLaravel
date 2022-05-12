<?php

namespace Database\Seeders;

use App\Models\Privilegios;
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
        
        \App\Models\User::create([
            'name'=>'Juan Alvarado',
            'email'=>'jaalvarado342@misena.edu.co',
            'empleadoId'=>'1',
            'rolId'=>'1',
            'foto'=>'foto',
            'password'=>bcrypt('123456')
        ]);

        \App\Models\Habitacion::create([
            'num_habitacion' =>'001',
            'descripcion'=>'la habitacion del bicho siuuu',
            'estado'=>'libre',
            'inventario'=>'inventario',
            'num_personas'=>'4',
            'foto'=>'la foto'
        ]);




        \App\Models\User::factory(10)->create();
        
        
        Privilegios::factory(20)->create();


        
        



        
    }
}
