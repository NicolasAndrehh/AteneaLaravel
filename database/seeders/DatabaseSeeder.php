<?php

namespace Database\Seeders;

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

        \App\Models\User::create([
            'name'=>'Juan Alvarado',
            'email'=>'juandres09@gmail.com',
            'rol'=>'administrador',
            'foto'=>'foto',
            'password'=>bcrypt('123456')
        ]);



        \App\Models\User::factory(10)->create();

        
    }
}
