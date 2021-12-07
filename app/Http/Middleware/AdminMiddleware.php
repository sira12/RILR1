<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Controllers\User;

class AdminMiddleware
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
      
        if (auth()->check() && str_contains($user->roleNames, 'SuperAdmin')){

            return $next($request);
        }

        return redirect('/panel');
       
    }
}
