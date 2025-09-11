<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
    ];

    public function estudantes()
    {
        return $this->hasMany(Estudante::class);
    }
}
