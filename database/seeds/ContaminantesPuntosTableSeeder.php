<?php

use Illuminate\Database\Seeder;
use App\PuntoMonitoreo;

class ContaminantesPuntosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PuntoMonitoreo::find(2)->contaminantes()->sync([1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16]);
    }
}
