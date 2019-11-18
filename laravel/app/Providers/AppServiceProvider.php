<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Route;
use Auth;
Use App\User;
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
        
        Blade::if('emp', function(){
            if(Auth::guard('empresa')){
                return true;
            }
            else 
                return false;
        });
        Blade::directive('cand', function(){
            return "<?php if(auth()->guard('web')->check()): ?>";

        });

        Blade::directive('endcand', function(){
            
            return "<?php endif; ?>";
        });
    }
}