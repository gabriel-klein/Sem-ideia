<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class IsCliente
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
            if ($user->userable_type == "App\Cliente"){
                return $next($request);
            }   
        }
        return route('welcome');
    }
}
