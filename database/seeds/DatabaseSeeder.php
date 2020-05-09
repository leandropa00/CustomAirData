<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        
        // $this->call(EmpresasTableSeeder::class);
        // $this->call(UsersTableSeeder::class);
        // $this->call(ContaminantesTableSeeder::class);
        // $this->call(CampanasTableSeeder::class);
        // $this->call(EstacionesTableSeeder::class);
        // $this->call(PuntosMonitoreoTableSeeder::class);
        // $this->call(ContaminantesPuntosTableSeeder::class);
        // $this->call(TipoParametroSeeder::class);
        // $this->call(ParametroSeeder::class);
        
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
