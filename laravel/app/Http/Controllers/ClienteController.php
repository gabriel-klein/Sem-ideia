<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Auth;
use App\User;
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
        $clientes = Cliente::paginate(8);
        return view('cliente.index', compact('clientes'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        $user= User::where([
            ['userable_id','=',$cliente->id],
            ['userable_type','=','Cliente'],
        ])->get()->first();

        $bairros = ["badu","Baldeador","Barreto","Boa Viagem","Cachoeiras","Cafubá",
                  "Camboinhas","Cantagalo","Cantareira","Caramujo","Charitas","Cubango",
                  "Engenho do Mato","Engenhoca","Fátima","Fonseca","Gragoatá","Icaraí",
                  "Ilha da Conceição","Ingá","Itacoatiara","Itaipu","Ititioca","Jacaré",
                  "Jardim Imbuí","Jurujuba","Largo da Batalha","Maceió","Maravista",
                  "Maria Paula","Matapaca","Morro do Estado","Muriqui","Pé Pequeno",
                  "Piratininga","Ponta d'Areia","Rio do Ouro","Santa Bárbara",
                  "Santa Rosa","Santana","Santo Antônio","São Domingos","São Francisco",
                  "São Lourenço","Sapê","Serra Grande","Tenente Jardim",
                  "Várzea das Moças","Viçoso Jardim","Vila Progresso","Viradouro",
                  "Vital Brazil"];
        
        return view('cliente.edit', compact(['cliente', 'user','bairros']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClienteRequest $request, Cliente $cliente)
    {
        if(!$cliente->update($request->all())){
        return back()
                 ->with('erro','Erro ao atualizar os dados!!');
        }
        else
        {
            $user = User::where([
                ['userable_id','=', $cliente->id],
                ['userable_type','=','Cliente']
            ])->get()->first();
            
            if($request->input('password')==NULL)
            {
                $request['password']=$user->password;
            }

            else
            {
                $request['password'] = Hash::make($request->get('password'));
            }

            if($user->update($request->all()))
            {
                return redirect()->route('home')
                ->with('sucesso','Dados atualizados com sucesso!!');
            }

            else
            {
                return redirect()->route('cliente.edit',compact(['cliente', 'user']))
                ->with('erro','Erro ao atualizar os dados!!')
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

    public function curriculo($id)
    {
        $cliente = Cliente::find($id);
        $conhecimentos = Conhecimento::all();

        return view('cliente/curriculo',compact(['conhecimentos','cliente']));
    }

    public function conhecimento(Request $request)
    {
        $cliente = Cliente::find(auth()->user()->userable->id);
        $conhecimentos = [];
        
        foreach ($request->all() as $parametro => $valor) {
            if (Str::contains($parametro, "Conhecimento") && $valor != "") {
                $conhecimentos[Str::after($parametro, "Conhecimento_")] = ["nivel" => $valor];
            }
        }
        
        $cliente->conhecimentos()->sync($conhecimentos);
        $cliente->descricaoPessoal = $request->descricaoPessoal;
        $cliente->save();

        return redirect('experiencia')
                    ->with('sucesso','Conhecimentos cadastrados com sucesso!!');
    }
}
