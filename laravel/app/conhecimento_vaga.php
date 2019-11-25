<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class conhecimento_vaga extends Model
{
    public function conhecimentos_vagas(){
        return $this->hasOne('App\Vaga')
                    ->withPivot('nivel')
                    ->withTimestamps();
    }
}
