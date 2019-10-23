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
    
    /**
     * Método da Agregação
     *
     * @return void
     */
    public function user(){
        return $this->morphOne('App\User', 'userable');
    }
    
    
}
