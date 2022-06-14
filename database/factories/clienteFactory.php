<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\cliente>
 */
class ClienteFactory extends Factory
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
            
            'nombres' => $this->faker->name(),
            'apellidos' => $this->faker->name(),
            'procedencia'=>'fusagasuga',
            
            'telefono'=>'3000978888',
            'email'=>'jajk@gmail.com',
            
            




            
            
            
        ];
    }
}


