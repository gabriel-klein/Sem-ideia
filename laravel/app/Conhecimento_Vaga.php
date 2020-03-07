<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConhecimentoVaga extends Model
{
    public function conhecimentos_vagas(){
        return $this->hasOne('App\Vaga')
                    ->withPivot('nivel')
                    ->withTimestamps();
    }
}
