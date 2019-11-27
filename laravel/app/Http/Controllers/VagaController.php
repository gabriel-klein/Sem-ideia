<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use App\Http\Requests\VagaRequest;
use App\Vaga;
use Auth;
use App\Conhecimento;


class VagaController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('empresa')->except(['index', 'show']);
        $this->conhecimentos = Conhecimento::all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->userable_type == "Empresa"){
            $vagas =  Auth::user()->userable->vagas()
                        ->latest()->simplePaginate(8);
        }
        else {
            $vagas = Vaga::where('status', 'Ativa')
                    ->latest()->simplePaginate(8);
        }
        return view('vagas.index', compact('vagas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $conhecimentos = $this->conhecimentos;
        return view('vagas.create', compact('conhecimentos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VagaRequest $request)
    {
        $vaga = Auth::user()->userable->vagas()->create($request->all());
        if (!$vaga){
            return redirect()->route('vagas.index')
                    ->with('erro', 'Erro ao cadastrar a vaga!');
        }
        /*$vaga->conhecimentos()
             ->attach($request->escolaridade, ['nivel' => $request->escolaridade_nivel]);
        $conhecimentos = Arr::where($request->all(), function ($value, $key){
            return Str::contains($key, 'con');
        });
        foreach ($conhecimentos as $key => $value) {
            if(!Str::contains($key, 'nivel')){
                $vaga->conhecimentos()
                     ->attach($value, ['nivel' => $request[$key."_nivel"]]);
            }
        }*/
        $escolaridade=$request->input('escolaridade');
        $vaga->conhecimentos()->attach( array(
                1 => array('nivel' => $request->input('escolaridade')),
                2 => array('nivel' => $request->input('excel')),
                3 => array('nivel' => $request->input('word')),
                4 => array('nivel' => $request->input('ingles')),
            ));
        return redirect()->route('vagas.index')
                    ->with('sucesso', 'Vaga cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vaga  $vaga
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,Vaga $vaga)
    {   
        return view('vagas.show', compact('vaga'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vaga  $vaga
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Vaga $vaga)
    {
        $conhecimentos= $vaga->conhecimentos;
        return view('vagas.edit', compact(['conhecimentos','vaga']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vaga  $vaga
     * @return \Illuminate\Http\Response
     */
    public function update(VagaRequest $request, Vaga $vaga)
    {
        if(!$vaga->update($request->all())){
            return redirect()->route('vagas.index')
                ->with('erro', 'Erro ao atualizar a vaga!');
        }
        /*$vaga->conhecimentos()->detach();
        $vaga->conhecimentos()
             ->attach($request->escolaridade, ['nivel' => $request->escolaridade_nivel]);
        
        $conhecimentos = Arr::where($request->all(), function ($value, $key){
            return Str::contains($key, 'con');
        });
        foreach ($conhecimentos as $key => $value) {
            if(!Str::contains($key, 'nivel')){
                $vaga->conhecimentos()
                     ->attach($value, ['nivel' => $request[$key."_nivel"]]);
            }
        }*/
        $vaga->conhecimentos()->sync( array(
                1 => array('nivel' => $request->input('escolaridade')),
                2 => array('nivel' => $request->input('excel')),
                3 => array('nivel' => $request->input('word')),
                4 => array('nivel' => $request->input('ingles')),
            ));

        return redirect()->route('vagas.index')
                ->with('sucesso', 'Vaga editada com sucesso!');
    }
}
