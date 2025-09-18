<?php

namespace Database\Factories;

use App\Models\Estudante;
use App\Models\Medida;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ocorrencia>
 */
class OcorrenciaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $estudante = Estudante::inRandomOrder()->first()->id ?? null;
        $medida = Medida::inRandomOrder()->first()->id ?? null;

        return [
            'descricao' => $this->faker->sentence(),
            'estudante_id' => $estudante,
            'medida_id' => $medida,
        ];
    }
}
