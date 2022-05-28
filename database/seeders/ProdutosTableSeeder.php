<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\models\Produto;


class ProdutosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $produto = Produto::all();

        if ($produto->count() == 0) {

            \App\Models\Produto::factory(100)->create();
            \App\Models\Produto::factory()->create([
                'Descricao' => 'teste',
                'Barras' => rand(1, 100),
                'ValorUnitario'  => rand(1, 100),
                'Quantidade'  => rand(1, 100),
            ]);
        }
    }
}
