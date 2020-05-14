<?php

use Illuminate\Database\Seeder;
use App\Contaminante;

class ContaminantesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contaminante::truncate();
        DB::insert("
            INSERT INTO `contaminantes` (`id`, `nombre_campo`, `nombre`, `unidad_inicial`, `conversion`, `unidad_final`) VALUES
            (1, 'pm10', 'PM10', 'µg/m3', 1, 'µg/m3'),
            (2, 'pm25', 'PM2.5', 'µg/m3', 1, 'µg/m3'),
            (3, 'tsp', 'TSP', 'µg/m3', 1, 'µg/m3'),
            (4, 'so2', 'SO2', 'ppb', 2.62, 'µg/m3'),
            (5, 'o3', 'O3', 'ppb', 1.96, 'µg/m3'),
            (6, 'co', 'CO', 'ppm', 1.15, 'mg/m3'),
            (7, 'no', 'NO', 'ppb', 1.23, 'µg/m3'),
            (8, 'no2', 'NO2', 'ppb', 1.88, 'µg/m3'),
            (9, 'nox', 'NOX', 'ppb', 1.68, 'µg/m3'),
            (10, 'dv', 'DV', '° DEG', 1, '° DEG'),
            (11, 'vv', 'VV', 'm/s', 1, 'm/s'),
            (12, 'hr', 'HR', '%', 1, '%'),
            (13, 'temp', 'TEMP', '° C', 1, '° C'),
            (14, 'pb', 'PB', 'mmHg', 1, 'mmHg'),
            (15, 'rs', 'RS', 'W/m2', 1, 'W/m2'),
            (16, 'rain', 'RAIN', 'mm', 1, 'mm'),
            (17, 'humedad', 'HR interna', '%', 1, '%'),
            (18, 'temp2', 'TEMP interna', '° C', 1, '° C'),
            (19, 'vel_aspiracion', 'VEL aspiracion', 'm/s', 1, 'm/s'),
            (20, 'estado_puerta', 'Estado Puerta', 'ON', 1, 'ON')
        ");
    }
}
