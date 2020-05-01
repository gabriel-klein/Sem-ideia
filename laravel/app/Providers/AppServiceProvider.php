<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Database\Eloquent\Relations\Relation;
use Route;
use Auth;
use App\Cliente;
use App\Empresa;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Route::resourceVerbs([
            'create' => 'criar',
            'edit' => 'editar',
        ]);

        Relation::morphMap([
            'Empresa' => 'App\Empresa',
            'Cliente' => 'App\Cliente',
        ]);


        Blade::if('typeUser', function ($typeUser) {
            return Auth::user()->userable_type == $typeUser;
        });

        // Remover Gradualmente do Código
        Blade::if('emp', function () {
            return Auth::user()->userable_type == "Empresa";
        });

        Blade::if('Educacao', function () {
            $cliente = Cliente::find(Auth::user()->userable_id);
            return $cliente->descricaoPessoal == NULL;
        });

        Blade::if('Vagas', function () {
            if(Auth::user()->userable_type == "Cliente")
                return false;
            $empresa = Empresa::find(Auth::user()->userable_id);
            $vagas = $empresa->vagas();
            return $vagas->count() == 0 ;
        });

        Blade::include('layouts.components.navbar', 'navbar');
        Blade::include('layouts.components.input', 'input');
        Blade::include('layouts.components.option', 'option');
        Blade::component('layouts.components.select', 'select');
        Blade::include('layouts.components.textarea', 'textarea');
        Blade::include('layouts.components.radio', 'radio');
        Blade::include('layouts.components.table', 'table');
        Blade::include('layouts.components.filtroVaga', 'filtroVaga');
        Blade::include('layouts.components.filtroCliente', 'filtroCliente');
    }
}
