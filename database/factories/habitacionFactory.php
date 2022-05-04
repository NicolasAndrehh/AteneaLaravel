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
            
            'num_habitacion' =>Str::random(3),
            'descripcion' => $this->faker->text(50),
            'estado' => 'Activo',
            'inventario' => 'inventario',
            'num_personas'=>'3',
            'foto' =>'foto',
                
        ];
    }
}


