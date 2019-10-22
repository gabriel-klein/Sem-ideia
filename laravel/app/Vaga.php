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
     * @return Empresa
     */
    public function empresa(){
        return $this->belongsTo('App\Empresa');
    }

}
