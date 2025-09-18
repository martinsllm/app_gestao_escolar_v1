<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Estudante;

class EstudanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Estudante::factory(30)->create();
    }
}
