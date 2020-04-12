<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Empresa;
use App\Http\Requests\EmpresaRequest;

class EmpresaController extends Controller
{
    public function __construct()
    {
        $this->middleware('empresa')->except(['index', 'show']);
    }
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
     * @param Empresa $empresa
     * @return void
     */
    public function edit(Empresa $empresa)
    {
        $user = $empresa->user;

        return view('empresa.edit', compact(['empresa', 'user']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EmpresaRequest $request
     * @param Empresa $empresa
     * @return void
     */
    public function update(EmpresaRequest $request, Empresa $empresa)
    {
        if (!$empresa->update($request->all())) {
            return back()
                ->with('erro', 'Erro ao atualizar os dados!!');
        } else {
            $user = $empresa->user;

            if ($request->input('password') == null) {
                $request['password'] = $user->password;
            } else {
                $request['password'] = Hash::make($request->get('password'));
            }

            if ($user->update($request->all())) {
                return redirect()->route('home')
                    ->with('sucesso', 'Dados atualizados com sucesso!!');
            } else {
                return redirect()->route('empresa.edit', compact(['empresa', 'user']))
                    ->with('erro', 'Erro ao atualizar os dados!!')
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
