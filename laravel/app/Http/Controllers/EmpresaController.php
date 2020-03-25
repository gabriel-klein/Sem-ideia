<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\EmpresaRequest;
use Illuminate\Support\Facades\Validator;

use App\User;
use App\Empresa;

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
        $user = User::where([
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
    public function update(EmpresaRequest $request, Empresa $empresa)
    {
            if(!$empresa->update($request->all())){
            return back()
                     ->with('erro','Erro ao atualizar os dados!!');
            }
            else
            {
                $user = User::where([
                    ['userable_id','=',$empresa->id],
                    ['userable_type','=','Empresa']
                ])->get()->first();
                
                if($request->input('password')==NULL)
                {
                    $request['password']=$user->password;
                }

                else
                {
                    $request['password'] = Hash::make($request->get('password'));
                }

                if($user->update($request->all()))
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
