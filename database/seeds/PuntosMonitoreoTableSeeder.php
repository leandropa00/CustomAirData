<?php

use Illuminate\Database\Seeder;
use App\PuntoMonitoreo;
use App\DetallePunto;

class PuntosMonitoreoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PuntoMonitoreo::truncate();
        DetallePunto::truncate();
        
        PuntoMonitoreo::insert([
            "id" => "2",
            "alias" => "Portería",
            "estacion_id" => "1",
            "campana_id" => "1",
            "latitud" => "4.713804",
            "longitud" => "-74.244893",
            "ruta" => "/Applications/Ampps/www/datos/sim/",
        ]);

        DetallePunto::insert([
            "punto_id" => "2"
        ]);
    }
}
