<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vaga extends Model
{
    protected $fillable = [
        'descricao', 'qtd', 'empresa_id'
    ];

    /**
     * Método da Relação 1-N
     *
     * @return empresa
     */
    public function empresa(){
        return $this->belongsTo('App\Empresa');
    }

    /**
     * Método da Relação N-N
     *
     * @return array
     */
    public function conhecimentos(){
        return $this->belongsToMany('App\Conhecimento');
    }

}
