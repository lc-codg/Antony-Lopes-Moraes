<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public $timestamps = false;
    public function run()
    {

        $this->call(UsuariosTableSeeder::class);
        $this->call(ProdutosTableSeeder::class);
        $this->call(ClientesTableSeeder::class);
    }
}
