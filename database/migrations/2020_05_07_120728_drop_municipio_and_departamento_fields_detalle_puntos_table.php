<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropMunicipioAndDepartamentoFieldsDetallePuntosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detalle_puntos', function (Blueprint $table) {
            $table->dropColumn(['departamento', 'municipio']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detalle_puntos', function (Blueprint $table) {
            $table->string('departamento', 20)->nullable()->after('descripcion');
            $table->string('municipio', 20)->nullable()->after('departamento');
        });
    }
}
