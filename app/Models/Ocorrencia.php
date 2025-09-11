<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ocorrencia extends Model
{
    protected $fillable = [
        'descricao',
        'estudante_id',
        'castigo_id',
    ];

    public function estudante()
    {
        return $this->belongsTo(Estudante::class);
    }

    public function medida()
    {
        return $this->hasOne(Medida::class);
    }
}
