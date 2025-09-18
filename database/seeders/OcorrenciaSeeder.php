<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ocorrencia;

class OcorrenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ocorrencia::factory(30)->create();
    }
}
