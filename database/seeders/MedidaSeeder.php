<?php

namespace Database\Seeders;

use App\Models\Medida;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Medida::create([
            'descricao' => 'Advertência verbal',
        ]);

        Medida::create([
            'descricao' => 'Advertência por escrito',
        ]);

        Medida::create([
            'descricao' => 'Suspensão',
        ]);

        Medida::create([
            'descricao' => 'Expulsão',
        ]);

    }
}
