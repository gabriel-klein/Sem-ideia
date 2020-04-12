<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Http\Requests\AdminRequest;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AdminRequest $request
     * @return void
     */
    public function store(AdminRequest $request)
    {
        $user = new User();

        $request['password'] = Hash::make($request->get('password'));

        if ($user->create($request->all())) {
            return redirect()->route('home')
                ->with('sucesso', 'Usuário criado com sucesso!!');
        } else {
            return redirect()->route('admin.create', compact(['user']))
                ->with('erro', 'Erro ao criar usuário!!')
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return void
     */
    public function show(User $user)
    {
        //
    }

    /**
     *  Show the form for editing the specified resource.
     *
     * @param User $user
     * @return void
     */
    public function edit(User $user)
    {
        return view('admin.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AdminRequest $request
     * @param User $user
     * @return void
     */
    public function update(AdminRequest $request, User $user)
    {
        if ($request->input('password') == null) {
            $request['password'] = $user->password;
        } else {
            $request['password'] = Hash::make($request->get('password'));
        }

        if ($user->update($request->all())) {
            return redirect()->route('home')
                ->with('sucesso', 'Dados atualizados com sucesso!!');
        } else {
            return redirect()->route('admin.edit', compact(['user']))
                ->with('erro', 'Erro ao atualizar os dados!!')
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return void
     */
    public function destroy(User $user)
    {
        if ($user->delete()) {
            return redirect()->route('home')
                ->with('sucesso', 'Usuário removido com Sucesso!!');
        } else {
            return redirect()->route('home')
                ->with('erro', 'Erro ao remover o usuário!!');
        }
    }
}
