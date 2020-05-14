<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::insert([
            "name" => "Admin",
            "email" => "admin@gmail.com",
            "password" => Hash::make("123456789"),
            "rol" => "admin"
        ]);
    }
}
