<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Industria;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

    public function indexOperador(){

        $AuthController = new AuthenticatedSessionController();
        $user = auth()->user();
        $user->roles=$AuthController->getRoleUser($user->id_usuario);
        $user->roleNames=$AuthController->roleNames($user->id_usuario);

        $industrias=DB::table('industria')->get();


        return view('index-admin',
                    ['industrias'=>$industrias]);

    }
}
