<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    protected $fillable = [
        'codigo',
    ];

    public function estudantes()
    {
        return $this->hasMany(Estudante::class);
    }
}
