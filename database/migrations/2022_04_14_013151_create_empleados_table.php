<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();

            $table->string('num_documento');
            $table->string('tipo_documento');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('ciudad');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('correo');
            $table->string('cargo');
            $table->string('horario');
            $table->string('estado');
            $table->string('contrato');
            $table->string('foto');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados');
    }
};
