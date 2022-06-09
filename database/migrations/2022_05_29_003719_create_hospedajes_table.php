<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('hospedajes', function (Blueprint $table) {
            $table->id();
            
            $table->date('fechaInicio');
            $table->date('fechaFin');
            $table->integer('numPersonas');
            $table->integer('dias');
            $table->integer('valorTotal');
            $table->integer('pagosRecibidos');

            $table->bigInteger('clienteId')->unsigned();
            $table->bigInteger('habitacionId')->unsigned();

            $table->foreign('clienteId')->references('id')->on('clientes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('habitacionId')->references('id')->on('habitacions')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hospedajes');
    }
};
