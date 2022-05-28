<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'Descricao' => 'Hamburguer - ' . substr($this->faker->name(), 0, 7),
            'Barras' => rand(1, 100),
            'ValorUnitario'  => $this->faker->randomFloat(2, 12, 35),
            'Quantidade'  => rand(1, 100),
        ];
    }
}
