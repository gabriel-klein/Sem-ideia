<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    
    /**
     * Atributos que serão atriuidos em massa
     *
     * @var array
     */
    protected $fillable = [
        'idade', 'cel1', 'cel2', 'h_disponivel', 'aprendiz'
    ];
    
    /**
     * Método da Agregação
     *
     * @return App\User
     */
    public function user(){
        return $this->morphOne('App\User', 'userable');
    }

    /**
     * Método da Relação N-N
     *
     * @return array App\Conhecimento
     */
    public function conhecimentos(){
        return $this->belongsToMany('App\Conhecimento');
    }
}
