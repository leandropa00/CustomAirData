<?php

use Illuminate\Database\Seeder;
use App\Estacion;

class EstacionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estacion::truncate();
        Estacion::insert([
            "nombre" => "Simulador",
            "serial" => "123456",
            "modelo" => "Prueba",
            "fecha_compra" => "2020-04-28",
            "observaciones" => "Ninguna",
        ]);
    }
}
