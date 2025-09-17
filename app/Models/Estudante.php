<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudante extends Model
{
    use HasFactory;

    protected $fillable = [
        'matricula',
        'nome_completo',
        'data_nascimento',
        'telefone_responsavel',
        'email',
        'turma_id'
    ];

    protected $casts = [
        'data_nascimento' => 'date:d/m/Y',
        'created_at' => 'datetime:d/m/Y H:i',
        'updated_at' => 'datetime:d/m/Y H:i',
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

