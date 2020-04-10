<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Experiencia;
use App\Http\Requests\ExperienciaRequest;

class ExperienciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Cliente $cliente)
    {
        $experiencias =  $cliente->experiencias()
                        ->latest()->simplePaginate(8);

        return view('cliente.experiencia.index', compact('experiencias', 'cliente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Cliente $cliente)
    {
        return view('cliente.experiencia.create', compact('cliente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Cliente $cliente, ExperienciaRequest $request)
    {
        $experiencia = $cliente->experiencias()->create($request->all());
        
        if (!$experiencia){
            return redirect()->route('experiencias.index', $cliente->id)
                    ->with('erro', 'Erro ao cadastrar a experiência!');
                }
        else
            return redirect()->route('experiencias.index', $cliente->id)
                    ->with('sucesso', 'Experiência cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente, Experiencia $experiencia)
    {
        return view('cliente.experiencia.edit', compact('experiencia', 'cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Cliente $cliente, ExperienciaRequest $request, Experiencia $experiencia)
    {

        if(!$experiencia->update($request->all()))
        {
            return redirect()->route('experiencias.index', $cliente->id)
                ->with('erro', 'Erro ao atualizar a Experiência!');
        }
        return redirect()->route('experiencias.index', $cliente->id)
            ->with('sucesso', 'Experiência editada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
