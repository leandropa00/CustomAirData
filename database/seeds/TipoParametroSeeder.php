<?php

use Illuminate\Database\Seeder;
use App\TipoParametro;

class TipoParametroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoParametro::truncate();

        TipoParametro::insert([
            'nombre' => 'Departamento'
        ]);

        TipoParametro::insert([
            'nombre' => 'Municipio'
        ]);
    }
}
