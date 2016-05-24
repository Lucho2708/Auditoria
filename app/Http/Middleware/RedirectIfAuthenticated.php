<?php

namespace Auditoria\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class RedirectIfAuthenticated
{
    /**
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
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->check()) {

            

            if ($request->user()->role == 'edit'){

                return redirect('/edit/users');
            }
            if ($request->user()->role == 'admin'){

                return redirect('/admin/users');
            }
            if ($request->user()->role == 'member'){

                return redirect('/member/users');
            }
            if ($request->user()->role == 'edit'){

                return redirect('/edit/users');
            }
            if ($request->user()->role == 'auditor'){

                return redirect('/auditor/users');
            }
        }

        return $next($request);
    }
}
