<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class IsEmpresa
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()){
            $user = Auth::user();
            if ($user->userable_type == "App\Empresa"){
                return $next($request);
            }
        }
        return redirect()->route('home')->with('erro', 'Ação não autorizada');
    }
}
