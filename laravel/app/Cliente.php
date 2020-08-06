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
        'idade', 'cel1', 'cel2', 'bairro', 'descricaoPessoal', 'escolaridade', 'h_disponivel', 'aprendiz'
    ];

    public function getTelefoneAttribute()
    {
        return ($this->cel1 && $this->cel2) ? $this->cel1 . " / " . $this->cel2 : $this->cel1;
    }

    public static function busca($filtro, $bairros, $escolaridades)
    {
        if($filtro->escolaridade == NULL)
        $filtro->escolaridade = $escolaridades;

        if($filtro->bairro == NULL)
        $filtro->bairro = $bairros;

        if($filtro->h_disponivel == NULL)
        $filtro->h_disponivel = ['Manhã', 'Tarde', 'Integral'];

    //dd(is_numeric($filtro->idade));

        if(!(is_numeric($filtro->idade)))
        {
            $idade = $filtro->idade;
            $filtro->idade = 0;
        }

        $retorno = Cliente::whereIn('bairro',$filtro->bairro)
        ->whereIn('escolaridade',$filtro->escolaridade)
        ->where('idade', '>', $filtro->idade)
        ->whereIn('h_disponivel',$filtro->h_disponivel)
        ->latest()->Paginate(5);
            

        if($filtro->escolaridade == $escolaridades)
        $filtro->escolaridade = NULL;

        if($filtro->bairro == $bairros)
        $filtro->bairro = NULL;

        if($filtro->h_disponivel == ['Manhã', 'Tarde', 'Integral'])
        $filtro->h_disponivel = NULL;

        if($filtro->idade == 0)
        $filtro->idade = $idade;

        if($filtro->conhecimento != NULL)
        {
            foreach ($retorno as $key=>$retorno) {
            $id[$key] = [$retorno->id];
            }
            if($filtro->nivel == NULL)
            {
                 $retorno = Cliente::whereIn('id',$id)
                ->whereHas('conhecimentos', function($q) use($filtro)
                {
                    $q->where('nome', 'like', $filtro->conhecimento);
                })
                ->latest()->Paginate(5);
            }
            else
            {
                 $retorno = Cliente::whereIn('id',$id)
                ->whereHas('conhecimentos', function($q) use($filtro)
                {
                    $q->where('nivel', 'like', $filtro->nivel)
                      ->where('nome', 'like', $filtro->conhecimento);
                })
                ->latest()->Paginate(5);
            }
        }

        return $retorno;
    }

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
     * Método da Relação N-N
     *
     * @return array App\Conhecimento
     */
    public function conhecimentos()
    {
        return $this->belongsToMany('App\Conhecimento')
            ->withPivot('nivel')
            ->withTimestamps();
    }

    public function vagas()
    {
        return $this->belongsToMany('App\Vaga')
            ->withTimestamps();
    }

    /**
     * Método do relacionamento 1-N
     *
     * @return void
     */
    public function experiencias()
    {
        return $this->hasMany('App\Experiencia');
    }
}
