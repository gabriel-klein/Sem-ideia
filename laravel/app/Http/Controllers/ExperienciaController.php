<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ExperienciaRequest;

use Auth;
use App\User;
use App\Cliente;
use App\Experiencia;

class ExperienciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $experiencias =  Auth::user()->userable->experiencias()
                        ->latest()->simplePaginate(8);

        return view('experiencia.index', compact('experiencias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('experiencia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExperienciaRequest $request)
    {
        $experiencia = Auth::user()->userable->experiencias()->create($request->all());
        if (!$experiencia){
            return redirect()->route('experiencia.index')
                    ->with('erro', 'Erro ao cadastrar a experiência!');
                }
        else
            return redirect()->route('experiencia.index')
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
    public function edit(Experiencia $experiencia)
    {
        return view('experiencia.edit', compact('experiencia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExperienciaRequest $request, Experiencia $experiencia)
    {

        if(!$experiencia->update($request->all()))
        {
            return redirect()->route('experiencia.index')
                ->with('erro', 'Erro ao atualizar a Experiência!');
        }
        return redirect()->route('experiencia.index')
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
