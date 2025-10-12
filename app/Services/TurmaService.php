<?php

namespace App\Services;

use App\Models\Turma;
use Illuminate\Database\Eloquent\Collection;

class TurmaService
{
    // Service methods for Turma operations would go here
    public function __construct(public Turma $turma)
    {
        $this->turma = $turma;
    }

    public function list(): Collection
    {
        return $this->turma->all();
    }

    public function findByPk(string $id): ?Turma
    {
        return $this->turma->find($id);
    }

    public function store(array $data): Turma
    {
        return $this->turma->create($data);
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