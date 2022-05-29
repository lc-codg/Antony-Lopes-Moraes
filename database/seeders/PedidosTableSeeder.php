<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\models\Pedidos;

class PedidosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pedidos = Pedidos::all();


        if ($pedidos->count() == 0) {

            \App\Models\Pedidos::factory(1)->create();
            \App\Models\Pedidos::factory()->create([
                'CodigoDoCliente' => 1,
                'Total' => $this->faker->randomFloat(2, 12, 100),
                'TotalDesconto' => $this->faker->randomFloat(2, 12, 10),
                'TotalAcréscimo' => $this->faker->randomFloat(2, 12, 20),
                'DtPedido' => now(),


            ]);
        }
    }
}
