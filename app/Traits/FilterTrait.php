<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait FilterTrait {

    public function filter(Builder $query, $request) {
        foreach($request as $key => $value){
            $query->where($key, 'like', "%$value%");
        }
        
    }

}