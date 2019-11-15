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
        $this->conhecimentos = Conhecimento::all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->userable_type == "App\Empresa"){
            $vagas =  Auth::user()->userable->vagas()
                        ->latest()->simplePaginate(10);
        }
        else {
            $vagas = Vaga::where('status', 'Ativa')
                    ->latest()->simplePaginate(10);
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
        $this->middleware('IsEmpresa');
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
        $vaga = Auth::user()->userable->vagas()->create([
            'descricao' => $request->descricao,
            'status' => $request->status,
            'quantidade' => $request->quantidade,
        ]);
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
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vaga  $vaga
     * @return \Illuminate\Http\Response
     */
    public function show(Vaga $vaga)
    {
        return view('vagas.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vaga  $vaga
     * @return \Illuminate\Http\Response
     */
    public function edit(Vaga $vaga)
    {
        $this->middleware('IsEmpresa');
        $conhecimentos = $this->conhecimentos;
        return view('vagas.edit', compact(['conhecimentos', 'vaga']));
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
        $vaga->update($request->all());
        $vaga->conhecimentos()->detach();
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
        }
    }

}
