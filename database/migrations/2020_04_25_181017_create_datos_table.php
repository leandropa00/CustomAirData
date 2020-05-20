<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
            $table->integer('punto_id');
            $table->index('punto_id');
            $table->foreign('punto_id')->references('id')->on('puntos_monitoreo')->constrained()->onDelete('restrict')->onUpdate('cascade');
            $table->timestamp('fecha_hora');
            $table->string('nombre_archivo', 10);
            $table->string('pm10', 10);
            $table->string('pm25', 10);
            $table->string('tsp', 10);
            $table->string('so2', 10);
            $table->string('o3', 10);
            $table->string('co', 10);
            $table->string('no', 10);
            $table->string('no2', 10);
            $table->string('nox', 10);
            $table->string('dv', 10);
            $table->string('vv', 10);
            $table->string('hr', 10);
            $table->string('temp', 10);
            $table->string('pb', 10);
            $table->string('rs', 10);
            $table->string('rain', 10);
            $table->string('humedad', 10);
            $table->string('temp2', 10);
            $table->string('vel_aspiracion', 10);
            $table->string('estado_puerta', 10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datos');
    }
}
