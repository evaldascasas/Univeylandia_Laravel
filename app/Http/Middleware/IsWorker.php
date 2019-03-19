<?php

namespace App\Http\Middleware;

use Illuminate\Contracts\Auth\Guard;

use Closure;

class IsWorker
{
    protected $auth;

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
        if ($this->auth->user()->id_rol === 1) {
            //$this->auth->logout();
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->to('/home');
            }
        }

        return $next($request);
    }
}
