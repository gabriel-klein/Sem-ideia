<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experiencia extends Model
{
    /**
     * Atributos que serão atriuidos em massa
     *
     * @var array
     */
    protected $fillable = [
        'local', 'descricao', 'data_inicio', 'data_fim', 'comprovacao'
    ];

    /**
     * Método da Relação 1-N
     *
     * @return App\Cliente
     */
    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }
}
