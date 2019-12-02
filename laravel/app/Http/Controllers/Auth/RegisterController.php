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
use Illuminate\Http\Request;

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
    protected function register(Request $request)
    {
        if($request->get('typeUser')=='Empresa')
        {
            //dd($request->get('typeUser'));
            $validator = Validator::make($request->all(), [
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'  => ['required', 'string', 'min:8', 'confirmed'],
            'cnpj'      => ['required', 'string', 'min:18', 'max:18',new ValidaCnpj, 'unique:empresas'],
            'razao_social' => ['required', 'string'],
            ]);
            if( $validator->fails()){
            return redirect('register')
                     ->withErrors($validator)
                     ->withInput();
            }
            else
            {
                $userable = Empresa::create([
                'cnpj' => $request->get('cnpj'),
                'razao_social' => $request->get('razao_social'),
                ]);

                $user = $userable->user()->create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => Hash::make($request->get('password')),
                ]);
            }
        }
        if($request->get('typeUser')=='Cliente')
        {
            $validator = Validator::make($request->all(), [
            'name'      => ['required', 'string', 'max:255',],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'  => ['required', 'string', 'min:8', 'confirmed'],
            'idade'         => ['required', 'numeric', 'min:14', 'max:80'],
            'cel1'          => ['required', 'string', 'min:15', 'max:16', 'unique:clientes'],
            'cel2'          => ['nullable', 'string', 'min:15', 'max:16'],
            'aprendiz'      => ['required', 'string'],
            'h_disponivel'  => ['required', 'string'],
            ]);
            if( $validator->fails()){
            return redirect('register')
                     ->withErrors($validator)
                     ->withInput();
            }
            else
            {
                $userable = Cliente::create([
                'idade' => $request->get('idade'),
                'cel1' => $request->get('cel1'),
                'cel2' => $request->get('cel2'),
                'h_disponivel' => $request->get('h_disponivel'),
                'aprendiz' => $request->get('aprendiz'),
                ]);

                $user = $userable->user()->create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => Hash::make($request->get('password')),
                ]);
            }
        }
        $credentials =['email' => $request->get('email'), 'password' => $request->get('password')];
        if( Auth()->guard()->attempt($credentials))
        {
            return redirect('/home');
        }

         
    }
    /**
     * Valida os dados referentes a empresa
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validateEmpresa (array $data)
    {
        dd($data);
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
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validateCliente (array $data)
    {
        return Validator::make($data, [
            'idade'         => ['required', 'numeric', 'min:14', 'max:80'],
            'cel1'          => ['required', 'string', 'min:15', 'max:16', 'unique:clientes'],
            'cel2'          => ['nullable', 'string', 'min:15', 'max:16'],
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
            'userable_type' => $data['typeUser'],
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
        if ($data['typeUser'] == "Empresa") {
            $userable = Empresa::create($data);
        }
        else if ($data['typeUser'] == "Cliente") {
            $userable = Cliente::create($data);
        }
        $userable->user()->save($user);
    }
}
