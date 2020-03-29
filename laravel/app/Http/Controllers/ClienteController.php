<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ClienteRequest;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ConhecimentoRequest;

use Auth;
use App\User;
use App\Cliente;
use App\Conhecimento;

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

    public function curriculo()
    {
        $user = Cliente::find(auth()->user()->userable->id);
        $conhecimentos = $user->conhecimentos;

        return view('cliente/curriculo',compact(['conhecimentos','user']));
    }

    public function conhecimento(Request $request)
    {
        $user = Cliente::find(auth()->user()->userable->id);

        $user->conhecimentos()->sync( array(
            1 => array('nivel' => $request->input('escolaridade')),
            2 => array('nivel' => $request->input('excel')),
            3 => array('nivel' => $request->input('word')),
            4 => array('nivel' => $request->input('ingles')),
        ));

        $user->descricaoPessoal = $request->descricaoPessoal;
        $user->save();

        return redirect('experiencia')
                    ->with('sucesso','Conhecimentos cadastrados com sucesso!!');
    }
}
