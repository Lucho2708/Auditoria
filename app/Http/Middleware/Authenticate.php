<?php

namespace Auditoria\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use Redirect;
use Session;
use Log;

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
                Log::info('Usuario no autenticado trata de ingresar al sistema');

                return redirect::to('login');
            }
        }

        if ($request->user()->role != $role){

            Log::info('El usuario: '.$request->user()->name.' con Email: '.$request->user()->email.' y perfil: '.$request->user()->role.' esta tratando de ingresa a un area restringida');
            return abort(403, 'Usuario No autorizado');

        }

        if ($request->user()->estado=='desacivado'){

            
            return redirect::to('logout');
        }

        return $next($request);
    }
}
