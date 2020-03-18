<?php

namespace App\Http\Controllers\Auth;

use App\Rules\ValidaCnpj;
use App\User;
use App\Cliente;
use App\Empresa;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'  => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Valida os dados referentes a empresa
     *
     * @return void
     */
    protected function validateEmpresa (array $data)
    {
        return Validator::make($data, [
            'cnpj' => [
                'required', 'string', 'min:18', 
                'max:18', new ValidaCnpj, 'unique:empresas'
            ],
            'razao_social' => ['required', 'string'],
        ]);
    }
    
    /**
     * Valida os dados referentes a empresa
     *
     * @param array $data
     * @return void
     */
    protected function validateCliente (array $data)
    {
        return Validator::make($data, [
            'idade'         => ['required', 'numeric', 'min:14', 'max:80'],
            'cel1'          => ['required', 'string', 'min:15', 'max:16', 'unique:clientes'],
            'cel2'          => ['nullable', 'string', 'min:15', 'max:16'],
            'bairro'        => ['required'],
            'aprendiz'      => ['required', 'string'],
            'h_disponivel'  => ['required', 'string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * Cria novo cliente ou empresa e associa ao usuário recém criado
     *
     * @param array $data
     * @param App\User $user
     * @return void
     */
    protected function createUserable (array $data, $user)
    {
        if(isset($data['typeUser'])){
            if ($data['typeUser'] == "Empresa") {
                $userable = Empresa::create($data);
            }
            else if ($data['typeUser'] == "Cliente") {
                $userable = Cliente::create($data);
            }
            $userable->user()->save($user);
        }
        else {
            return false;
        }
    }
}
