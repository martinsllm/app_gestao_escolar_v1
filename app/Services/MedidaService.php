<?php

namespace App\Services;

use App\Models\Medida;
use Illuminate\Database\Eloquent\Collection;

class MedidaService
{
    public function __construct(public Medida $medida)
    {
        $this->medida = $medida;
    }

    public function list(): Collection
    {
        return $this->medida::all();
    }

    public function findByPk(string $id): ?Medida
    {
        return $this->medida->findOrFail($id);
    }

    public function store(array $data): Medida
    {
        return $this->medida->create($data);
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
