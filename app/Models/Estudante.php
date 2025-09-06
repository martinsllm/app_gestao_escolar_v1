<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudante extends Model
{
    protected $fillable = [
        'matricula',
        'nome_completo',
        'data_nascimento',
        'telefone_responsavel',
        'turma_id'
    ];

    public function turma()
    {
        return $this->belongsTo(Turma::class);
    }

    public function ocorrencias()
    {
        return $this->hasMany(Ocorrencia::class);
    }
}

