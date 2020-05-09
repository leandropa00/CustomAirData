<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContaminantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contaminantes', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('nombre_campo', 20);
            $table->string('nombre', 15);
            $table->string('unidad_inicial', 15);
            $table->float('conversion');
            $table->string('unidad_final', 15);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contaminantes');
    }
}
