<?php

use Illuminate\Database\Seeder;
use App\Campana;

class CampanasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Campana::truncate();
        Campana::insert([
            "empresa_id" => "1",
            "nombre" => "Campaña de prueba",
            "fecha_inicio" => "2020-04-24",
            "fecha_fin" => "2020-04-26",
            "observaciones" => "Prueba",
        ]);
    }
}
