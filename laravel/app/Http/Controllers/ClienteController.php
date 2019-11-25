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
        $users = \App\User::where('userable_type','=','Cliente')->get();
        //dd($users);
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
        $conhecimentos = $this->conhecimentos;
        return view('cliente.edit', compact(['cliente', 'conhecimentos']));
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
        //
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
