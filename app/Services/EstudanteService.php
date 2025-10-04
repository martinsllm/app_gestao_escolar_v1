<?php

namespace App\Services;

use App\Models\Estudante;
use Illuminate\Database\Eloquent\Collection;

class EstudanteService
{
    public function list(): Collection
    {
        return Estudante::all();
    }

    public function findByPk(string $id): ?Estudante
    {
        return Estudante::with('turma','ocorrencias')->find($id);
    }

    public function store(array $data): Estudante
    {
        return Estudante::create($data);
    }

    public function update(Estudante $estudante, array $data): Estudante
    {
        $estudante->fill($data);
        $estudante->save();
        return $estudante;
    }

    public function delete(Estudante $estudante): void
    {
        $estudante->delete();
    }
}
