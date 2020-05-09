<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallePuntosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_puntos', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('punto_id');
            $table->index('punto_id');
            $table->foreign('punto_id')->references('id')->on('puntos_monitoreo')->constrained()->onDelete('restrict')->onUpdate('cascade');
            $table->string('descripcion', 100)->nullable();
            $table->string('departamento', 20)->nullable();
            $table->string('municipio', 20)->nullable();
            $table->string('direccion', 60)->nullable();
            $table->string('foto_norte', 100)->nullable();
            $table->string('foto_sur', 100)->nullable();
            $table->string('foto_este', 100)->nullable();
            $table->string('foto_oeste', 100)->nullable();
            $table->enum('tipo_area', ['Urbana', 'Suburbana', 'Rural'])->nullable();
            $table->enum('tiempo', ['Fija', 'Inactiva'])->nullable();
            $table->enum('emision_dominante', ['Tráfico', 'Punto crítico', 'Industrial', 'De fondo'])->nullable();
            $table->string('distancia_borde', 100)->nullable();
            $table->string('ancho_via', 10)->nullable();
            $table->string('velocidad_promedio', 10)->nullable();
            $table->string('porcentaje_vehiculos_pesados', 10)->nullable();
            $table->string('estado_via', 25)->nullable();
            $table->enum('trafico_diario_sentido_uno', ['0', '1'])->default('0');
            $table->enum('trafico_diario_sentido_dos', ['0', '1'])->default('0');
            $table->string('tiempo_muestreo', 10)->nullable();
            $table->enum('clima', ['Seco', 'Humedo'])->nullable();
            $table->string('tipo', 10)->nullable();
            $table->string('distancia_fuente', 10)->nullable();
            $table->string('direccion_grados', 10)->nullable();
            $table->enum('fuente_evualuada', ['Calle libre', 'Calle encajonada'])->nullable();;
            $table->enum('cercania_ciudades', ['Regionales'])->nullable();
            $table->string('observaciones_punto_critico', 100)->nullable();
            $table->string('distancia_cabecera_municipal', 20)->nullable();
            $table->string('observaciones_distancia_cabecera_municipal', 100)->nullable();
            $table->string('cobertura_3g', 25)->nullable();
            $table->string('observaciones_cobertura_3g', 100)->nullable();
            $table->string('tipo_acceso_unidad', 25)->nullable();
            $table->string('observaciones_tipo_acceso', 100)->nullable();
            $table->string('horario_atencion', 25)->nullable();
            $table->string('observaciones_horario_atencion', 100)->nullable();
            $table->string('distancia_punto_conexion', 25)->nullable();
            $table->string('observaciones_distancia_punto_conexion', 100)->nullable();
            $table->string('distancia_estacion_servicio', 25)->nullable();
            $table->string('observaciones_distancia_estacion_servicio', 100)->nullable();
            $table->string('tiempo_acceso_punto_monitoreo', 25)->nullable();
            $table->string('observaciones_tiempo_acceso_punto_monitoreo', 100)->nullable();
            $table->string('condiciones_seguridad', 25)->nullable();
            $table->string('observaciones_condiciones_seguridad', 100)->nullable();
            $table->enum('condiciones_seguridad_checkbox', ['0', '1'])->default('0');
            $table->string('observaciones_condiciones_seguridad_checkbox', 100)->nullable();
            $table->enum('exposicion_sensores', ['0', '1'])->default('0');
            $table->string('observaciones_exposicion_sensores', 100)->nullable();
            $table->enum('condiciones_logistica', ['0', '1'])->default('0');
            $table->string('observaciones_condiciones_logistica', 100)->nullable();
            $table->enum('cercania_parqueadero', ['0', '1'])->default('0');
            $table->string('observaciones_cercania_parqueadero', 100)->nullable();
            $table->enum('cercania_carreteras_sin_pavimento', ['0', '1'])->default('0');
            $table->string('observaciones_cercania_carreteras_sin_pavimento', 100)->nullable();
            $table->string('descripcion_contacto', 60)->nullable();
            $table->string('nombre_contacto', 60)->nullable();
            $table->string('celular_contacto', 20)->nullable();
            $table->string('fijo_contacto', 20)->nullable();
            $table->string('email_contacto', 60)->nullable();
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
        Schema::dropIfExists('detalle_puntos');
    }
}
