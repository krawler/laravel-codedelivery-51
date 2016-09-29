<?php

namespace CodeDelivery\Http\Middleware;

use Closure;
<<<<<<< HEAD
use Illuminate\Contracts\Auth\Guard;
=======
use Illuminate\Support\Facades\Auth;
>>>>>>> 8338ce9c3cd850f2215745648192ff978e4be93f

class Authenticate
{
    /**
<<<<<<< HEAD
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new middleware instance.
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
        //dd($this->auth->check());
        if ($this->auth->guest()) {

            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('auth/login');
=======
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('login');
>>>>>>> 8338ce9c3cd850f2215745648192ff978e4be93f
            }
        }

        return $next($request);
    }
}
