<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\User;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.loggin');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {


        $request->authenticate();
        $user = Auth::user();

        //en caso de requerir la automatizacion de autorizacion comentar el if y el else
       if($user->activo != "N" && $user->activo != "P"){

           $request->session()->regenerate();


           $UserData=New User();
           $user=$UserData->GetinfoUser();


           if(str_contains($user->roleNames, 'ADMINISTRADOR') || str_contains($user->roleNames, 'SUPERADMIN')){
               return redirect('/dash');
           }else{
               return redirect('/panel');
           }

       }else{

           if($user->activo=="N")
               $msg="Su cuenta encuantra deshabilitada, por favor comuniquese con un administrador.";

           if($user->activo=="P")
               $msg="Su cuenta esta en estado de verificación, se le notificará por mail cuando pueda ingresar.";

           Auth::guard('web')->logout();

           return view('auth.loggin',[
               'userInactivo'=>$msg
           ]);
       }

    }


    public function destroyAux(Request $request,$status)
    {
        if($status=="N")
            $msg="Su cuenta encuantra deshabilitada, por favor comuniquese con un administrador.";

        if($status=="P")
            $msg="Su cuenta esta en estado de verificación, se le notificará por mail cuando pueda ingresar.";

         Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/',[
        'userInactivo'=>$msg
        ]);
    }


    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
