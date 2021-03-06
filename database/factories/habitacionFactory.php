<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Habitacion>
 */
class HabitacionFactory extends Factory
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
            'estado' => 'libre',
            'inventario' => 'inventario',
            'num_personas'=>'3',
            'foto' =>'foto',
                
        ];
    }
}


