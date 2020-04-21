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

     //data formatada 

    public function setDatainicioAttribute($value)
    {
        $this->attributes['data_inicio'] = date('y-m-d', strtotime($value));
    }
    public function setDatafimAttribute($value)
    {
        $this->attributes['data_fim'] = date('y-m-d', strtotime($value));
    }
    
    public function getDatainicioAttribute()
    {
        return date('d/m/Y', strtotime($this->attributes['data_inicio']));
    }
    public function getDatafimAttribute()
    {
        return date('d/m/Y', strtotime($this->attributes['data_fim']));
    }

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
