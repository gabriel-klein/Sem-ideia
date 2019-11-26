<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VagaRequest extends FormRequest
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
            'funcao' => 'required|min:7|max:255',
            'descricao' => 'required|min:15|max:255',
            'quantidade' => 'required|numeric|min:1|max:30',
            'status' => ['required', Rule::in(['Ativa', 'Desativada'])],
            'email_de_contato'     => ['required', 'string', 'email', 'max:255',]
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
            'quantidade.min' => 'A quantidade deve ser de no mínimo 1',
            'quantidade.max' => 'A quantidade deve ser de no máximo 30',
        ];
    }
}
