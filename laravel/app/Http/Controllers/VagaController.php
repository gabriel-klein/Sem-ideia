<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Auth;
use App\Vaga;
use App\Cliente;
use App\Conhecimento;
use App\Http\Requests\VagaRequest;

class VagaController extends Controller
{

    public function __construct()
    {
        $this->middleware('empresa')->only(['create', 'edit', 'store', 'update']);
        $this->conhecimentos = Conhecimento::all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->userable_type == "Empresa") {
            $vagas =  Auth::user()->userable->vagas()
                ->latest()->Paginate(5);
        } else {
            $vagas = Vaga::where('status', 'Ativa')
                ->latest()->Paginate(5);
        }
        return view('vagas.index', compact('vagas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Vaga $vaga)
    {
        $funcoes = [
            "Operador(a) de Caixa", "Coordenador(a)/Gerente de Loja",
            "Vigia/Prevenção de perdas", "Estoquista", "Babá/Cuidador", "Estimulador",
            "Cozinheiro", "Garçom/Garçonete", "Atendente de Telemarketing", "Frentista"
        ];

        $escolaridades = [
            "Superior Completo", "Superior Incompleto", "Médio Completo",
            "Médio Incompleto", "Fundamental Completo", "Fundamental Incompleto"
        ];

        $conhecimentos = $this->conhecimentos;

        $vagaConhecimentos = [];

        foreach ($vaga->conhecimentos as $conhecimento) {
            $vagaConhecimentos[$conhecimento->id] = $conhecimento->pivot->nivel;
        }

        return view('vagas.create', compact('conhecimentos', 'funcoes', 'escolaridades','vagaConhecimentos'));
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

        if (!$vaga) {
            return redirect()->route('vagas.index')
                ->with('erro', 'Erro ao cadastrar a vaga!');
        }

        $conhecimentos = [];

        foreach ($request->all() as $parametro => $valor) {
            if (Str::contains($parametro, "Conhecimento") && $valor != "") {
                $conhecimentos[Str::after($parametro, "Conhecimento_")] = ["nivel" => $valor];
            }
        }

        $vaga->conhecimentos()->sync($conhecimentos);

        return redirect()->route('vagas.index')
            ->with('sucesso', 'Vaga cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vaga  $vaga
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Vaga $vaga)
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
        $conhecimentos = $this->conhecimentos;

        $funcoes = [
            "Operador(a) de Caixa", "Coordenador(a)/Gerente de Loja",
            "Vigia/Prevenção de perdas", "Estoquista", "Babá/Cuidador", "Estimulador",
            "Cozinheiro", "Garçom/Garçonete", "Atendente de Telemarketing", "Frentista"
        ];

        $escolaridades = [
            "Superior Completo", "Superior Incompleto", "Médio Completo",
            "Médio Incompleto", "Fundamental Completo", "Fundamental Incompleto"
        ];

        $vagaConhecimentos = [];

        foreach ($vaga->conhecimentos as $conhecimento) {
            $vagaConhecimentos[$conhecimento->id] = $conhecimento->pivot->nivel;
        }

        return view('vagas.edit', compact(['vaga', 'funcoes', 'escolaridades', 'conhecimentos','vagaConhecimentos']));
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
        if (!$vaga->update($request->all())) {
            return redirect()->route('vagas.index')
                ->with('erro', 'Erro ao atualizar a vaga!');
        }

        $conhecimentos = [];

        foreach ($request->all() as $parametro => $valor) {
            if (Str::contains($parametro, "Conhecimento") && $valor != "") {
                $conhecimentos[Str::after($parametro, "Conhecimento_")] = ["nivel" => $valor];
            }
        }

        $vaga->conhecimentos()->sync($conhecimentos);

        return redirect()->route('vagas.index')
            ->with('sucesso', 'Vaga editada com sucesso!');
    }


    public function cancelarCandidatura(Request $request)
    {
        Vaga::find($request->vaga)
            ->clientes()->detach(Cliente::find($request->cliente));

        return redirect()->route('vagas.index')
            ->with('sucesso', 'Cancelamento de candidatura feito com sucesso!');
    }

    public function candidatar(Request $request)
    {
        Vaga::find($request->vaga)
            ->clientes()->attach(Cliente::find($request->cliente));

        return redirect()->route('vagas.index')
            ->with('sucesso', 'Seus dados aparecerão na vaga! Boa Sorte!');
    }

    public function destroy(Vaga $vaga)
    {
        if (!$vaga->delete()) {
            return redirect()->route('vagas.index')
                ->with('erro', 'Erro ao excluir a Vaga');
        }
        return redirect()->route('vagas.index')
            ->with('sucesso', 'Vaga excluida com sucesso!');
    }
}
