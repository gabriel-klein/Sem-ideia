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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
            'cnpj' => ['required', 'string', 'max:20', new ValidaCnpj],
            'razao_social' => ['required', 'string'],
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
     * @param [type] $user
     * @return void
     */
    protected function createUserable (array $data, $user)
    {
        if ($data['typeUser'] == "Empresa"){
            $empresa = Empresa::create($data);
            $empresa->user()->save($user);
        }
    }
}
