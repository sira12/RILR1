<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

        $request->session()->regenerate();

        $user = auth()->user();
        $user->roles=$this->getRoleUser($user->id_usuario);
        $user->roleNames=$this->roleNames($user->id_usuario);

        if($user->roleNames[0]== 'SuperAdmin'){
            return redirect('/dash');
        }else{
            return redirect('/panel');
        }

       
    }

    public function roleNames($id_usuario){
    
        $roles=DB::table('user_role')->where('id_user','=',$id_usuario)
        ->join('rol','user_role.id_role','rol.id_rol')
        ->select(
            
            'rol.rol',
        )
        ->get();
            $rolename=[];
        foreach ($roles as $key => $role) {

            array_push($rolename,$role->rol);
            //$rolename[$role->rol];
        }
       
     return $rolename;
    }

    public function getRoleUser($id_usuario){
    
        $roles=DB::table('user_role')->where('id_user','=',$id_usuario)
        ->join('rol','user_role.id_role','rol.id_rol')
        ->select(
            'rol.id_rol',
            'rol.rol',
            'rol.description'
        )
        ->get();
       
        foreach($roles as $key => $role){

           $permisos= DB::table('permiso')->where('id_rol',$role->id_rol)
           ->select(
               'permiso.id_permiso',
               'permiso.seccion',
               'permiso.ver',
               'permiso.agregar',
               'permiso.modificar',
               'permiso.borrar',
               )
           ->get();
           $role->permisos=$permisos;
           //$roles_permiso[$key]=$role;

        }
     return $roles;
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
