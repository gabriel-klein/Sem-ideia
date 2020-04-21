<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Http\Requests\EmpresaRequest;
use App\Jobs\SendEmail;
use App\Mail\EmpresaAutorizada;
use App\Mail\EmpresaNegada;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;

class EmpresaController extends Controller
{
    public function __construct()
    {
        $this->middleware('empresa')->except(['index', 'show', 'autorizar', 'destroy']);
        $this->middleware('admin')->only(['autorizar', 'destroy']);
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
        return view('empresa.show', compact('empresa'));
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
        $user = $empresa->user;

        SendEmail::dispatchNow(new EmpresaNegada($user));
        $empresa->delete();
        $user->delete();

        return redirect()->route('home')
            ->with('sucesso', 'Empresa negada!!');
    }

    public function autorizar(Request $request, Empresa $empresa)
    {
        $empresa->autorizada = true;
        $empresa->save();
        SendEmail::dispatch(new EmpresaAutorizada($empresa->user));

        return redirect()->route('home')
            ->with('sucesso', 'Empresa autorizada!!');
    }
}
