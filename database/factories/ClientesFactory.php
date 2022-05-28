<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Clientes>
 */
class ClientesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'Nome' => $this->faker->name(),
            'CPF' => rand(120000, 140000),
            'RG'  => rand(150000, 160000),
            'CNPJ'  => rand(170000, 180000),
            'Email'  => $this->faker->unique()->safeEmail(),
            'Endereco' => $this->faker->address(),
            'Numero' => rand(1, 1000),
            'Bairro' => 'Centro',
            'Cidade' => $this->faker->city(),
            'UF' => $this->faker->stateAbbr,
        ];
    }
}
