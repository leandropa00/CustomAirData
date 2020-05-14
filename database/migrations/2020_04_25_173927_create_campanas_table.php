<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampanasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campanas', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('empresa_id');
            $table->index('empresa_id');
            $table->foreign('empresa_id')->references('id')->on('empresas')->constrained()->onDelete('restrict')->onUpdate('cascade');
            $table->string('nombre', 30);
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('observaciones', 100)->nullable();
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
        Schema::dropIfExists('campanas');
    }
}
