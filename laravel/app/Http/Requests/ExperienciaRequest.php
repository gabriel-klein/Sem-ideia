<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Rules\ValidaData;

class ExperienciaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'local'       => ['required','string','max:255'],
            'descricao'   => ['required','min:15','max:255'],
            'data_inicio' => ['required','date_format:Y-m-d'],
            'data_fim'    => ['required','date_format:Y-m-d', 'after:data_inicio', new ValidaData],
            'comprovacao' => ['required', Rule::in(['Sim', 'Não'])],
        ];
    }

    /**
     * Retorna as mensagens caso a validação falhe
     *
     * @return void
     */
    public function messages()
    {
        return [
            'data_inicio.date_format' => 'O campo Data De Início não corresponde ao formato desejado',

            'data_fim.date_format' => 'O campo Data De Término não corresponde ao formato desejado',
        ];
    }
}
