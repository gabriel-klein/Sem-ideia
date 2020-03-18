<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vaga extends Model
{    
    /**
     * Atributos que serão atriuidos em massa
     *
     * @var array
     */
    protected $fillable = [
        'descricao', 'quantidade', 'empresa_id', 'status', 'funcao'
    ];

    /**
     * Método da Relação 1-N
     *
     * @return App\Empresa
     */
    public function empresa(){
        return $this->belongsTo('App\Empresa');
    }

    /**
     * Método da Relação N-N
     *
     * @return array App\Conhecimento
     */
    public function conhecimentos(){
        return $this->belongsToMany('App\Conhecimento')
                    ->withPivot('nivel')
                    ->withTimestamps();
    }

}
