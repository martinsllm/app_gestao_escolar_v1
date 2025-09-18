<?php

namespace Database\Factories;

use App\Models\Turma;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Estudante>
 */
class EstudanteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $turma = Turma::inRandomOrder()->first()->id ?? Turma::factory()->create()->id;

        return [
            'matricula' => fake()->numerify('############'),
            'nome_completo' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'data_nascimento' => fake()->dateTimeBetween('-18 years', '-15 years'),
            'telefone_responsavel' => fake()->phoneNumber(),
            'turma_id' => $turma
        ];
    }
}
