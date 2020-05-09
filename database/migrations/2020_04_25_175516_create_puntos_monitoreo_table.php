<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePuntosMonitoreoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puntos_monitoreo', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('alias', 30);
            $table->integer('estacion_id');
            $table->index('estacion_id');
            $table->foreign('estacion_id')->references('id')->on('estaciones')->constrained()->onDelete('restrict')->onUpdate('cascade');
            $table->integer('campana_id');
            $table->index('campana_id');
            $table->foreign('campana_id')->references('id')->on('campanas')->constrained()->onDelete('restrict')->onUpdate('cascade');
            $table->string('ruta', 100);
            $table->string('latitud', 30);
            $table->string('longitud', 30);
            $table->timestamps();
            $table->softDeletes('deleted_at', 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('puntos_monitoreo');
    }
}
