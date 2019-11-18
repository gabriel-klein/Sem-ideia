<?php

namespace App\Http\Controllers;

use App\Empresa;
use Illuminate\Http\Request;
use App\Rules\ValidaCnpj;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('empresa.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa $empresa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        //
    }

    public function novo()
    {
        return view('empresa.cadastro');
    }

    public function login()
    {
        return view('empresa/login');
    }

    public function registro(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:empresas'],
            'password'  => ['required', 'string', 'min:8', 'confirmed'],
            'cnpj'      => ['required', 'string', 'min:18', 'max:18',new ValidaCnpj, 'unique:empresas'],
            'razao_social' => ['required', 'string'],
        ]);

        if( $validator->fails()){
            return redirect('empresa/cadastro')
                     ->withErrors($validator)
                     ->withInput();
        }
        else{
            Empresa::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'cnpj' => $request->get('cnpj'),
            'razao_social' => $request->get('razao_social'),
        ]);
            return redirect('empresa/login');
        }
    }

    public function postLogin(Request $request)
    {
        $credentials =['email' => $request->get('email'), 'password' => $request->get('password')];
        if( Auth()->guard('empresa')->attempt($credentials))
        {
            return redirect('/empresa/index');
        }
        else
        {
            return redirect('empresa/login')
                ->withErrors(['error' => 'Login Inválido'])
                ->withInput();
        }
    }

    public function logout()
    {
        auth()->guard('empresa')->logout();
        return redirect('empresa/login');
    }



}
