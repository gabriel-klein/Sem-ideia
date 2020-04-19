<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Vaga;
use App\Empresa;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $admins = null;
        $empresas = null;
        $clientes = null;
        $vagas = null;

        $data = null;

        if (Auth::user()->userable_id === null && Auth::user()->userable_type === null) {
            $admins = User::where([
                ['userable_id', null],
                ['userable_type', null]
            ])->get();
            $empresas = Empresa::where('autorizada', false)->get();
            $data = array('admins', 'empresas');
        }

        if (Auth::user()->userable_type === "Cliente") {
            $now = now();

            $vagas = Vaga::where('status', 'Ativa')
                ->whereBetween('created_at', [now()->subDays(10)->toDateTimeString(), now()->toDateTimeString()])
                ->latest()
                ->take(10)
                ->get();

            $data = array('vagas');
        }

        return view('home', compact($data));
    }
}
