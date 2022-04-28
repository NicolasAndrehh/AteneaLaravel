<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\empleado>
 */
class empleadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            
            'num_documento' =>Str::random(10),
            'tipo_documento' => 'C.C',
            'nombres' => $this->faker->name(),
            'apellidos' => $this->faker->name(),
            'ciudad'=>'fusagasuga',
            'direccion' =>'cualquiera',
            'telefono'=>'3000978888',
            'correo'=>'jajk@gmail.com',
            'cargo'=>'admin',
            'horario'=>'estado',
            'estado'=>'horario',
            'contrato'=>'algo',
            




            
            'foto'=> 'foto',
            
            
        ];
    }
}


