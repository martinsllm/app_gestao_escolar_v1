<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ocorrencia extends Model
{
    use HasFactory;

    protected $fillable = [
        'descricao',
        'estudante_id',
        'medida_id',
    ];

    public function estudante()
    {
        return $this->belongsTo(Estudante::class);
    }

    public function medida()
    {
        return $this->belongsTo(Medida::class);
    }
}
