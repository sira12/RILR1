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
        $user=auth()->user();

        $contribuyente=DB::table('rel_persona_contribuyente')->where('id_rel_persona_contribuyente',$user->id_rel_persona_contribuyente)->first();
        $industrias=DB::table('industria')
            ->leftjoin('rel_industria_actividad','industria.id_industria','=','rel_industria_actividad.id_industria')
            ->select(
                'industria.*',
                        'rel_industria_actividad.id_rel_industria_actividad'
            )
            ->where('industria.id_contribuyente','=',$contribuyente->id_contribuyente)
            ->get();

       /* $mi_industrias=DB::table('industria')
            ->join('contribuyente','industria.id_contribuyente','=','contribuyente.id_contribuyente')
            ->join('punto_cardinal','industria.id_punto_cardinal','=','punto_cardinal.id_punto_cardinal')
            ->join('localidad','industria.id_localidad','=','localidad.id_localidad')
            ->join('barrio','industria.id_barrio','=','barrio.id_barrio')

            ->join('calle','industria.id_calle','=','calle.id_calle')
            ->select(
                'industria.*',
                'contribuyente.*',
                'punto_cardinal.*',
                'localidad.id_localidad as loc',
                'barrio.id_barrio as barrio'
            )
            ->where('industria.id_contribuyente',$contribuyente->id_contribuyente)
            ->get();*/

        return view('index',[
            'industrias'=>$industrias,
            'id_contribuyente'=>$contribuyente->id_contribuyente
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
