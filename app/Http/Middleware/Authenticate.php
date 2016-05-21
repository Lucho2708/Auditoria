<?php

namespace Auditoria\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Redirect;

class Authenticate
{
    /**
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
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {

        if ($this->auth->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect::to('login');
            }
        }
        
        if ($request->user()->role != $role){
            return abort(403, 'Usuario No autorizado');
        }
    
        return $next($request);
    }
}
