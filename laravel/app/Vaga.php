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
        'descricao', 'quantidade', 'empresa_id', 'escolaridade', 'status', 'funcao', 'emailDeContato'
    ];

    public function getTempoAttribute()
    {
        $diff = now()->diff($this->created_at);
        $tempo = null;

        if ($diff->y) {
            $tempo = "Há $diff->y " . ($diff->y === 1 ? 'ano' : 'anos');
        } elseif ($diff->m) {
            $tempo = "Há $diff->m " . ($diff->m === 1 ? 'mês' : 'meses');
        } elseif ($diff->d) {
            $tempo = "Há $diff->d " . ($diff->d === 1 ? 'dia' : 'dias');
        } elseif ($diff->h) {
            $tempo = "Há $diff->h " . ($diff->h === 1 ? 'hora' : 'horas');
        } elseif ($diff->i) {
            $tempo = "Há $diff->i " . ($diff->i === 1 ? 'minuto' : 'minutos');
        } else {
            $tempo = "Há $diff->s " . ($diff->s === 1 ? 'segundo' : 'segundos');
        }

        return $tempo;
    }

    public static function busca($filtro, $funcoes, $escolaridades)
    {
        if($filtro->funcao == NULL)
        $filtro->funcao = $funcoes;

        if($filtro->escolaridade == NULL)
        $filtro->escolaridade = $escolaridades;

        $retorno = Vaga::whereIn('funcao',$filtro->funcao)
        ->whereIn('escolaridade',$filtro->escolaridade)
        ->Where([
            ['quantidade', '>', $filtro->quantidade],
            ['status', 'Ativa' ],
        ])
        ->latest()->Paginate(5);

        if($filtro->funcao == $funcoes)
            $filtro->funcao = NULL;

        if($filtro->escolaridade == $escolaridades)
            $filtro->escolaridade = NULL;

        return $retorno;
    }
    /**
     * Método da Relação 1-N
     *
     * @return App\Empresa
     */
    public function empresa()
    {
        return $this->belongsTo('App\Empresa');
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

    /**
     * Método da Relação N-N
     *
     * @return void
     */
    public function clientes()
    {
        return $this->belongsToMany('App\Cliente')
            ->withTimestamps();
    }
}
