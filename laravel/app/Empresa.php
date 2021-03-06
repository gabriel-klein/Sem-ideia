<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{

    /**
     * Atributos que serão atriuidos em massa
     *
     * @var array
     */
    protected $fillable = [
        'cnpj', 'razao_social'
    ];

    protected $attributes = [
        'autorizada' => false
    ];

    /**
     * Método da Agregação
     *
     * @return App\User
     */
    public function user()
    {
        return $this->morphOne('App\User', 'userable');
    }
    /**
     * Método do relacionamento 1-N
     *
     * @return void
     */
    public function vagas()
    {
        return $this->hasMany('App\Vaga');
    }
}
