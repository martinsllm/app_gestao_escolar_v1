<?php

namespace App\Services;

use App\Models\Medida;
use Illuminate\Database\Eloquent\Collection;

class MedidaService
{
    public function list(): Collection
    {
        return Medida::all();
    }

    public function findByPk(string $id): ?Medida
    {
        return Medida::findOrFail($id);
    }

    public function store(array $data): Medida
    {
        return Medida::create($data);
    }

    public function update(Medida $medida, array $data): Medida
    {
        $medida->fill($data);
        $medida->save();
        return $medida;
    }

    public function delete(Medida $medida): void
    {
        $medida->delete();
    }
}
