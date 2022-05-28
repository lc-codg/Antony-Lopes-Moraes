<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Clientes;

class ClientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $Clientes = Clientes::all();

        if ($Clientes->count() == 0) {

            \App\Models\Clientes::factory(100)->create();
            \App\Models\Clientes::factory()->create([
                'Nome' => 'Antony Lopes',
                'CPF' => rand(120000, 140000),
                'RG'  => rand(150000, 160000),
                'CNPJ'  => rand(170000, 180000),
                'Endereco' => 'teste',
                'Numero' => rand(1, 1000),
                'Bairro' => 'Mutua',
                'Cidade' => 'Rio de Janeiro',
                'UF' => 'RJ',
            ]);
        }
    }
}
