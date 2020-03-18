<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conhecimento extends Model
{
    protected $fillable = [
        'id','nome'
    ];

    public function conhecimentos(){
        return $this->belongsToMany('App\User','cliente_conhecimento','conhecimento_id','cliente_id','conhecimento_vaga','vaga_id','App\Vaga')
                    ->withPivot('nivel')
                    ->withTimestamps();
    }
}
