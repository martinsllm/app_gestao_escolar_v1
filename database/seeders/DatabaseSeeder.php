<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Estudante;
use App\Models\Medida;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            TurmaSeeder::class,
            EstudanteSeeder::class,
            MedidaSeeder::class,
            OcorrenciaSeeder::class,
        ]);


    }
}
