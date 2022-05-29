<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\models\Itens;

class ItensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $itens = Itens::all();


        if ($itens->count() == 0) {
            \App\Models\Itens::factory(1)->create();
            \App\Models\Itens::factory()->create([
            'Descricao'=>'Teste',
            'Barras' =>10,
            'ValorUnitario'=>10,
            'Quantidade'=>1,
            'NumeroDoPedido'=>1,
            'Subtotal'=>10,
            'Desconto'=>0,
            'Acrescimo'=>0
            ]);
    }
}
}
