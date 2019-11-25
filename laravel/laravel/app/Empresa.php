<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Rules\ValidaCnpj;

class Empresa extends Authenticatable
{
    
    /**
     * Atributos que serão atriuidos em massa
     *
     * @var array
     */
    protected $fillable = [
        'cnpj', 'name', 'email','password', 'razao_social'
    ];

     /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    
    /**
     * Método da Agregação
     *
     * @return App\User
     
    public function user(){
        return $this->morphOne('App\User', 'userable');
    }
    */
    /**
     * Método do relacionamento 1-N
     *
     * @return void
     */
    public function vagas(){
        return $this->hasMany('App\Vaga');
    }
    
    
}
