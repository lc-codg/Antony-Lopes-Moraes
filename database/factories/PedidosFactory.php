<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\models\Clientes;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PedidosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {
        $Cliente = Clientes::All();
        $id = $Cliente[0];
           return [
            'CodigoDoCliente' =>$id,
            'Total' => $this->faker->randomFloat(2, 12, 100),
            'TotalDesconto' => $this->faker->randomFloat(2, 12, 10),
            'TotalAcréscimo' => $this->faker->randomFloat(2, 12, 20),
            'DtPedido' => now(),
        ];
    }
}
