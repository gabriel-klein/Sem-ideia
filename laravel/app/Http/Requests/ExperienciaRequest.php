<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'data_inicio' => ['required'],
            'data_fim'    => ['required'],
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
        ];
    }
}
