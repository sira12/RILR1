<?php

namespace App\Http\Middleware;

use App\Http\Controllers\User;
use Closure;
use Illuminate\Http\Request;

class ContribuyenteMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {


        $authUser=New User();
        $user=$authUser->GetinfoUser();

        if (auth()->check() && str_contains($user->roleNames, 'USUARIO_INDUSTRIA')){

            return $next($request);
        }

        return redirect('/dash');
    }
}
