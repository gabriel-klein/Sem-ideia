<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Cliente;
use App\Conhecimento;
use App\Http\Requests\ClienteRequest;
use App\Http\Requests\ConhecimentoRequest;

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
        $clientes = Cliente::paginate(10);

        return view('cliente.index', compact('clientes'));
    }

    /**
     * Display the specified resource.
     *
     * @param Cliente $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        return view('cliente.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Cliente $cliente
     * @return void
     */
    public function edit(Cliente $cliente)
    {
        $user = $cliente->user;
        $bairros = [
            "Badu", "Baldeador", "Barreto", "Boa Viagem", "Cachoeiras", "Cafubá",
            "Camboinhas", "Cantagalo", "Cantareira", "Caramujo", "Charitas", "Cubango",
            "Engenho do Mato", "Engenhoca", "Fátima", "Fonseca", "Gragoatá", "Icaraí",
            "Ilha da Conceição", "Ingá", "Itacoatiara", "Itaipu", "Ititioca", "Jacaré",
            "Jardim Imbuí", "Jurujuba", "Largo da Batalha", "Maceió", "Maravista",
            "Maria Paula", "Matapaca", "Morro do Estado", "Muriqui", "Pé Pequeno",
            "Piratininga", "Ponta d'Areia", "Rio do Ouro", "Santa Bárbara",
            "Santa Rosa", "Santana", "Santo Antônio", "São Domingos", "São Francisco",
            "São Lourenço", "Sapê", "Serra Grande", "Tenente Jardim",
            "Várzea das Moças", "Viçoso Jardim", "Vila Progresso", "Viradouro",
            "Vital Brazil"
        ];

        return view('cliente.edit', compact(['cliente', 'user', 'bairros']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ClienteRequest $request
     * @param Cliente $cliente
     * @return void
     */
    public function update(ClienteRequest $request, Cliente $cliente)
    {
        if (!$cliente->update($request->all())) {
            return back()
                ->with('erro', 'Erro ao atualizar os dados!!');
        } else {
            $user = $cliente->user;

            if ($request->input('password') == null) {
                $request['password'] = $user->password;
            } else {
                $request['password'] = Hash::make($request->get('password'));
            }

            if ($user->update($request->all())) {
                return redirect()->route('home')
                    ->with('sucesso', 'Dados atualizados com sucesso!!');
            } else {
                return redirect()->route('cliente.edit', compact(['cliente', 'user']))
                    ->with('erro', 'Erro ao atualizar os dados!!')
                    ->withInput();
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Cliente $cliente
     * @return void
     */
    public function curriculoEdit(Cliente $cliente)
    {
        $user = $cliente->user;
        $conhecimentos = $this->conhecimentos;
        $escolaridades = [
            "Superior Completo", "Superior Incompleto", "Médio Completo",
            "Médio Incompleto", "Fundamental Completo", "Fundamental Incompleto"
        ];
        
        $clienteConhecimentos = [];

        foreach ($cliente->conhecimentos as $conhecimento) {
            $clienteConhecimentos[$conhecimento->id] = $conhecimento->pivot->nivel;
        }
        
        return view('cliente.curriculo.edit', compact(['conhecimentos', 'cliente', 'escolaridades', 'user', 'clienteConhecimentos']));
    }

    public function curriculoUpdate(ConhecimentoRequest $request, Cliente $cliente)
    {
        $conhecimentos = [];

        foreach ($request->all() as $parametro => $valor) {
            if (Str::contains($parametro, "Conhecimento") && $valor != "") {
                $conhecimentos[Str::after($parametro, "Conhecimento_")] = ["nivel" => $valor];
            }
        }

        $cliente->descricaoPessoal = $request->descricaoPessoal;
        $cliente->escolaridade = $request->escolaridade;
        $cliente->conhecimentos()->sync($conhecimentos);
        $cliente->save();


        return redirect()->route('experiencia.index', $cliente->id)
            ->with('sucesso', 'Conhecimentos cadastrados com sucesso!!');
    }
}
