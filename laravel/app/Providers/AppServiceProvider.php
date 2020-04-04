<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Route;
use Auth;
use Illuminate\Database\Eloquent\Relations\Relation;

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

        
        Blade::if('typeUser', function($typeUser){
            return Auth::user()->userable_type == $typeUser;
        });
           
        // Remover Gradualmente do Código
        Blade::if('emp', function(){
            return Auth::user()->userable_type == "Empresa";
        });
        
        Blade::include('layouts.components.navbar', 'navbar');
        Blade::include('layouts.components.input', 'input');
        Blade::include('layouts.components.option', 'option');
        Blade::component('layouts.components.select', 'select');
    }
}
