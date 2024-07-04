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
    public function definition(): array
    {
        return [
            'nome' => $this->faker->name(),
            'id_categoria' => rand(1, 10),
            'preco' => rand(1, 10000) / 100,
            'foto' => $this->faker->imageUrl(),
            'situacao' => rand(0, 1)
        ];
    }
}
