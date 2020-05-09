<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContaminantesPuntosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contaminantes_puntos', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('contaminante_id');
            $table->index('contaminante_id');
            $table->foreign('contaminante_id')->references('id')->on('contaminantes')->constrained()->onDelete('restrict')->onUpdate('cascade');
            $table->integer('punto_monitoreo_id');
            $table->index('punto_monitoreo_id');
            $table->foreign('punto_monitoreo_id')->references('id')->on('puntos_monitoreo')->constrained()->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contaminantes_puntos');
    }
}
