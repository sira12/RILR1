<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegimenIB;
use App\Models\CondicionIva;
use App\Models\NaturalezaJuridica;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Table;

class ProcedimientosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $regimen=RegimenIB::where('activo',"S")->get();
        $iva=CondicionIva::where('activo',"S")->get();
        $naturaleza_juridica=NaturalezaJuridica::where('activo',"S")->get();

        $per_fiscal=DB::table('periodo_fiscal')->where('anio',Carbon::now()->format('Y'))->first();

        $user=auth()->user();
        $rel=DB::table('rel_persona_contribuyente')->where('id_rel_persona_contribuyente',$user->id_rel_persona_contribuyente)->select('id_contribuyente')->first();
        $cuit=DB::table('contribuyente')->where('id_contribuyente',$rel->id_contribuyente)->select('cuit')->first();



        return view('Actividades.procedimientos',[
            'cuit'=>$cuit,
            'per_fiscal'=>$per_fiscal,
            'regimen'=> $regimen,
            'condicion_iva'=> $iva,
            'naturaleza_juridica'=> $naturaleza_juridica,
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
