<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRangesToContaminantesPuntosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contaminantes_puntos', function (Blueprint $table) {
            $table->float('minimo', 8,2)->nullable();
            $table->float('maximo', 8,2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contaminantes_puntos', function (Blueprint $table) {
            $table->dropColumn(['minimo', 'maximo']);
        });
    }
}
