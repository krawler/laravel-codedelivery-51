<?php

namespace CodeDelivery\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
<<<<<<< HEAD
    public function handle($request, Closure $next, $role)
=======
    public function handle($request, Closure $next)
>>>>>>> 8338ce9c3cd850f2215745648192ff978e4be93f
    {
        if(Auth::check()){
           return redirect('/auth/login');
        }
<<<<<<< HEAD

        if(Auth::user()->role <> $role){
           return redirect('/auth/login');
        }
=======
>>>>>>> 8338ce9c3cd850f2215745648192ff978e4be93f
        return $next($request);
    }
}
