<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RedirectsUsers;

use App\User;
use App\Cliente;
use App\Empresa;
use App\Rules\ValidaCnpj;
use App\Http\Controllers\Controller;

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

    use RedirectsUsers;

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

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $bairros = [
            "Badu","Baldeador","Barreto","Boa Viagem","Cachoeiras","Cafubá",
            "Camboinhas","Cantagalo","Cantareira","Caramujo","Charitas","Cubango",
            "Engenho do Mato","Engenhoca","Fátima","Fonseca","Gragoatá","Icaraí",
            "Ilha da Conceição","Ingá","Itacoatiara","Itaipu","Ititioca","Jacaré",
            "Jardim Imbuí","Jurujuba","Largo da Batalha","Maceió","Maravista",
            "Maria Paula","Matapaca","Morro do Estado","Muriqui","Pé Pequeno",
            "Piratininga","Ponta d'Areia","Rio do Ouro","Santa Bárbara",
            "Santa Rosa","Santana","Santo Antônio","São Domingos","São Francisco",
            "São Lourenço","Sapê","Serra Grande","Tenente Jardim",
            "Várzea das Moças","Viçoso Jardim","Vila Progresso","Viradouro",
            "Vital Brazil"
        ];
        
        return view('auth.register', compact(['bairros']));
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {   
        $this->validator($request->all())->validate();
        if ($request->typeUser == "Empresa"){
            $this->validateEmpresa($request->all());
        }
        else if ($request->typeUser == "Cliente"){
            $this->validateCliente($request->all());
        }
        event(new Registered($user = $this->create($request->all())));

        // $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        $this->createUserable($request->all(), $user);
        if ($request->typeUser == "Empresa" || $request->typeUser == "Cliente") {    
            if (($user->userable == NULL) || ($user->userable == null)){
                $user->delete();
                $request->session()->flash('erro', 'Ops! Ocorreu um erro ao criar sua conta!');
                return false;
            }
            $request->session()->flash('sucesso', 'Usuário criado com sucesso!');
        }
    }

}
