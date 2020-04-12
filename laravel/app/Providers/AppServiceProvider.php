<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Database\Eloquent\Relations\Relation;
use Route;
use Auth;

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

        Blade::include('layouts.components.navbar', 'navbar');
        Blade::include('layouts.components.input', 'input');
        Blade::include('layouts.components.option', 'option');
        Blade::component('layouts.components.select', 'select');
        Blade::include('layouts.components.textarea', 'textarea');
        Blade::include('layouts.components.radio', 'radio');
    }
}
