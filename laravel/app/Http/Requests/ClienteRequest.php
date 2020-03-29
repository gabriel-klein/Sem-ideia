<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Auth;
class ClienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->userable_type == "Cliente";
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'          => ['required', 'string', 'max:255', ],
            'email'         => ['required', 'string', 'email', 'max:255', Rule::unique('users')         ->ignore(auth()->user()->id)],
            'password'      => ['nullable', 'string', 'min:8', 'confirmed'],
            'idade'         => ['required', 'numeric', 'min:14', 'max:80'],
            'cel1'          => ['required', 'string', 'min:15', 'max:16', 
                                Rule::unique('clientes')->ignore(Auth::user()->userable_id)],
            'cel2'          => ['nullable', 'string', 'min:15', 'max:16'],
            'bairro'        => ['required'],
            'aprendiz'      => ['required', 'string'],
            'h_disponivel'  => ['required', 'string'],
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
