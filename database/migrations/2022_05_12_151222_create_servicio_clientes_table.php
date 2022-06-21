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
        Schema::create('servicio_clientes', function (Blueprint $table) {
            $table->id();
            
            $table->integer('valorTotal');
            $table->integer('pagosRecibidos');
            
            $table->bigInteger('servicioId')->unsigned();
            $table->bigInteger('clienteId')->unsigned();

            $table->foreign('servicioId')->references('id')->on('servicios')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('clienteId')->references('id')->on('clientes')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('servicio_clientes');
    }
};
