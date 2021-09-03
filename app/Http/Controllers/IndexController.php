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

        $contribuyente = DB::table('rel_persona_contribuyente')->where('id_rel_persona_contribuyente', $user->id_rel_persona_contribuyente)->first();

        $industrias = Industria::where('industria.id_contribuyente', '=', $contribuyente->id_contribuyente)->get();
        foreach ($industrias as $industria) {
            $act = $industria->actividades;
            $industria['actividad'] = $act;
        }

        return view('index', [
            'industrias' => $industrias,
            'id_contribuyente' => $contribuyente->id_contribuyente
        ]);
    }

}
