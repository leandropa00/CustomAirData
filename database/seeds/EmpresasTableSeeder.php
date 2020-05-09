<?php

use Illuminate\Database\Seeder;
use App\Empresa;

class EmpresasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Empresa::truncate();
        Empresa::insert([
            "nit" => "123",
            "nombre" => "AIRLAB Consulting",
            "correo" => "prueba@gmail.com",
            "telefono" => "12345678",
            "direccion" => "Dirección de prueba",
        ]);
    }
}
