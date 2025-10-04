<?php

namespace App\Services;

use App\Models\Ocorrencia;
use Illuminate\Database\Eloquent\Collection;

class OcorrenciaService
{

    public function list(): Collection
    {
        return Ocorrencia::all();
    }

    public function findByPk(string $id): ?Ocorrencia
    {
        return Ocorrencia::with('estudante')->find($id);
    }

    public function store(array $data): Ocorrencia
    {
        return Ocorrencia::create($data);
    }

    public function update(Ocorrencia $ocorrencia, array $data): Ocorrencia
    {
        $ocorrencia->fill($data);
        $ocorrencia->save();
        return $ocorrencia;
    }

    public function delete(Ocorrencia $ocorrencia): void
    {
        $ocorrencia->delete();
    }
}
