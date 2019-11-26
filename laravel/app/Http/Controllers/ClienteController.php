<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Conhecimento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\User;

class ClienteController extends Controller
{
    
    
    public function __construct()
    {   
        $this->middleware('cliente')->except(['index', 'show']);
        $this->conhecimentos = Conhecimento::all();
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = \App\Cliente::all();
        $users = \App\User::where('userable_type','=','Cliente')->simplePaginate(8);
        //dd($users->find(2)->userable->idade);
        return view('cliente.index', compact('clientes','users'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( Cliente $cliente)
    {
        //dd($cliente);
        return view('cliente.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        $users = \App\User::where('userable_type','=','Cliente');
        //dd($users->find($cliente->id)->userable_type);
        return view('cliente.edit', compact(['cliente', 'users']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        $validator = Validator::make($request->all(), [
            'name'      => ['required', 'string', 'max:255', 'alpha'],
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
                $update= $cliente->update($validator);

                if($update)
                {
                    return redirect()->route('home')
                    ->with('sucesso','Dados atualizados com sucesso!!');
                }
                else
                {
                    return redirect()->route('cliente.edit',compact('cliente'))
                    ->with('sucesso','Erro ao atualizar os dados!!')
                    ->withInput();
                }
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
    public function curriculo()
    {
        return view('cliente/curriculo');
    }

    public function Conhecimento(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'escolaridade'      => ['required'],
        ]);

        if( $validator->fails()){
            return redirect('cliente/conhecimento')
                     ->withErrors($validator)
                     ->withInput();
        }
        else{
            $user = Cliente::find(auth()->user()->userable->id);

            $user->conhecimentos()->sync( array(
                1 => array('nivel' => $request->input('escolaridade')),
                2 => array('nivel' => $request->input('excel')),
                3 => array('nivel' => $request->input('word')),
                4 => array('nivel' => $request->input('ingles')),
            ));

            return redirect('home');
        }
    }
}
