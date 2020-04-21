<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidaData implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $data_inicio = request('data_inicio');

        //Convertendo datas para o formato 'y-m-d'
        $data_inicio = date('y-m-d', strtotime($data_inicio));
        $value = date('y-m-d', strtotime($value));

        //Converte as datas para timestamp (segundos).
        $d1 = strtotime($data_inicio);
        $d2 = strtotime($value);

        //verifica a diferença em segundos entre as duas datas e divide pelo número de segundos que um dia possui.
        $qtd_dias = ($d2 - $d1) / 86400;

        if ($qtd_dias < 30) {
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Deve existir no mínimo 30 dias de diferenças entre as datas.';
    }
}
