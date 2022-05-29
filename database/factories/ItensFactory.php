<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\models\Produto;
use App\models\Pedidos;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Itens>
 */
class ItensFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'Descricao'=> Produto::pluck('Descricao')[0],
            'Barras' => Produto::pluck('Barras')[0],
            'ValorUnitario'=>Produto::pluck('ValorUnitario')[0],
            'Quantidade'=>1,
            'NumeroDoPedido'=>Pedidos::pluck('id')[0],
            'Subtotal'=>Produto::pluck('ValorUnitario')[0] ,
            'Desconto'=>0,
            'Acrescimo'=>0,

        ];
    }
}
