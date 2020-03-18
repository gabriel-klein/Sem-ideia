<?php

namespace App\Http\Controllers;

use App\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\User;
use Illuminate\Support\Facades\Validator;
use App\Rules\ValidaCnpj;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $user =\App\User::where([
            ['userable_id','=',$empresa->id],
            ['userable_type','=','Empresa'],
        ])->get()->first();
        //dd($user->name);
        return view('empresa.edit', compact(['empresa', 'user']));
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
         $validator = Validator::make($request->all(), [
            'name'      => ['required', 'string', 'max:255', ],
            'email'     => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore(auth()->user()->id)],
            'password'  => ['nullable', 'string', 'min:8', 'confirmed'],
            'cnpj'      => ['required', 'string', 'min:18', 'max:18',new ValidaCnpj, Rule::unique('empresas')->ignore($empresa->id)],
            'razao_social' => ['required', 'string'],
        ]);
            if( $validator->fails() ){
            return back()
                     ->withErrors($validator)
                     ->withInput();
            }
            else
            {
                $user =\App\User::where('userable_id','=',$empresa->id,'and','userable_type','=','Empresa')->get()->first();
                $request['password'] = Hash::make($request->get('password'));
                if($request->input('password')==NULL)
                {
                    $request['password']=$user->password;
                }
                $data = $request->all();
                $update= auth()->user()->update($data);

                if($update)
                {
                    return redirect()->route('home')
                    ->with('sucesso','Dados atualizados com sucesso!!');
                }
                else
                {
                    return redirect()->route('empresa.edit',compact(['empresa', 'user']))
                    ->with('erro','Erro ao atualizar os dados!!')
                    ->withInput();
                }
            }
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
}
