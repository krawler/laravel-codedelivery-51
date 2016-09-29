<?php

namespace CodeDelivery\Http\Middleware;

use Closure;
<<<<<<< HEAD
use Illuminate\Contracts\Auth\Guard;
=======
use Illuminate\Support\Facades\Auth;
>>>>>>> 8338ce9c3cd850f2215745648192ff978e4be93f

class RedirectIfAuthenticated
{
    /**
<<<<<<< HEAD
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
=======
>>>>>>> 8338ce9c3cd850f2215745648192ff978e4be93f
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
<<<<<<< HEAD
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->check()) {
=======
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
>>>>>>> 8338ce9c3cd850f2215745648192ff978e4be93f
            return redirect('/');
        }

        return $next($request);
    }
}
