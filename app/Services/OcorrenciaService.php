<?php

namespace App\Services;

use App\Models\Ocorrencia;
use App\Traits\FilterTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class OcorrenciaService
{

    use FilterTrait;

    public function __construct(public Ocorrencia $ocorrencia){
        $this->ocorrencia = $ocorrencia;
    }

    public function list($request): Builder {
        $query = $this->ocorrencia->query();

        if($request->has('estudante_id') || $request->has('medida_id')){
           $this->filter($query, $request->query());
        }
        
        return $query;
    }

    public function listAll(): Collection
    {
        return $this->ocorrencia->all();
    }

    public function findByPk(string $id): ?Ocorrencia
    {
        return $this->ocorrencia->with('estudante')->find($id);
    }

    public function store(array $data): Ocorrencia
    {
        return $this->ocorrencia->create($data);
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
