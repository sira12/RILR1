<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Industria;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        
        $user->roles=$this->getRoleUser($user->id_usuario);
        $user->roleNames=$this->roleNames($user->id_usuario);
        dd($user);

        $pers_contrib = DB::table('rel_persona_contribuyente')->where('id_rel_persona_contribuyente', $user->id_rel_persona_contribuyente)->first();
        $contribuyente=DB::table('contribuyente')->where('id_contribuyente',$pers_contrib->id_contribuyente)->get();

        $industrias = Industria::where('industria.id_contribuyente', '=', $pers_contrib->id_contribuyente)->get();
        foreach ($industrias as $industria) {
            $act = $industria->actividades;
            $industria['actividad'] = $act;
        }

        
        return view('index', [
            'industrias' => $industrias,
            'id_contribuyente' => $pers_contrib->id_contribuyente,
            'contribuyente'=>$contribuyente[0]
        ]);
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

}
