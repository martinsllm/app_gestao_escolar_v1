<?php

namespace App\Services;

use App\Models\Estudante;
use App\Traits\FilterTrait;
use Illuminate\Database\Eloquent\Builder;


class EstudanteService
{
    use FilterTrait;

    public function __construct(public Estudante $estudante) {
        $this->estudante = $estudante;
    }

    public function list($request): Builder {
        $query = $this->estudante->query();

        if($request->has('filtro')){
            $this->filter($query, $request->filtro);
        }
        
        return $query;
    }

    public function findByPk(string $id): ?Estudante
    {
        return $this->estudante->with('turma','ocorrencias')->find($id);
    }

    public function findMatricula(string $matricula): ?Estudante
    {
        return $this->estudante->where('matricula', $matricula)->first();
    }

    public function store(array $data): Estudante
    {
        return $this->estudante->create($data);
    }

    public function insertCsv(array $data){
        $this->estudante->insert($data);
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