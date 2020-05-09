<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeingKeysMunicipioDepartamentoDetallePuntosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detalle_puntos', function (Blueprint $table) {
            $table->integer('departamento')->nullable()->after('descripcion');
            $table->index('departamento');
            $table->foreign('departamento')->references('id')->on('parametros')->constrained()->onDelete('restrict')->onUpdate('cascade');
            $table->integer('municipio')->nullable()->after('departamento');
            $table->index('municipio');
            $table->foreign('municipio')->references('id')->on('parametros')->constrained()->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropColumn(['departamento', 'municipio']);
    }
}
