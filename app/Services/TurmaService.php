<?php

namespace App\Services;

use App\Models\Turma;
use Illuminate\Database\Eloquent\Collection;

class TurmaService
{
    // Service methods for Turma operations would go here
    public function list(): Collection
    {
        return Turma::all();
    }

    public function findByPk(string $id): ?Turma
    {
        return Turma::find($id);
    }

    public function store(array $data): Turma
    {
        return Turma::create($data);
    }

    public function update(Turma $turma, array $data): Turma
    {
        $turma->fill($data);
        $turma->save();
        return $turma;
    }

    public function delete(Turma $turma): void
    {
        $turma->delete();
    }

}

