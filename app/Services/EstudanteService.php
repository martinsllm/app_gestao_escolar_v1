<?php

namespace App\Services;

use App\Models\Estudante;
use Illuminate\Database\Eloquent\Builder;

class EstudanteService
{
    public function list($request): Builder{
        $query = Estudante::query();

        if($request->has('filtro')){
            $filtros = explode(';', $request->filtro);
            foreach($filtros as $key => $condicao){
                $c = explode(':', $condicao);
                $query->where($c[0], $c[1], $c[2]);
            }
        }
        
        return $query;
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
