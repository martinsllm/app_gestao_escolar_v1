<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait FilterTrait {

    public function filter(Builder $query, $request): Builder {
        $filtros = explode(';', $request);

        foreach($filtros as $key => $condicao){
            $c = explode(':', $condicao);
            $query->where($c[0], $c[1], $c[2]);
        }
        
        return $query;
    }

}