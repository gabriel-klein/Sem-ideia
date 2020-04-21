<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conhecimento extends Model
{
    protected $fillable = [
        'nome'
    ];

    public function conhecimentos()
    {
        return $this->belongsToMany(
            'App\Cliente',
            'cliente_conhecimento',
            'conhecimento_id',
            'cliente_id',
            'conhecimento_vaga',
            'vaga_id',
            'App\Vaga'
        )->withPivot('nivel')->withTimestamps();
    }
}
