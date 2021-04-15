<?php

namespace App\Http\Controllers;

use App\Models\PeriodoActividadContribuyente;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Carbon\Carbon;
class PeriodoActividadContribuyenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
         $params = array();
         parse_str($request->data, $params);

         $fecha=Carbon::createFromFormat('d-m-Y', $params['fecha_actividad_contribuyente'])->toDateTimeString();

         $periodo= new PeriodoActividadContribuyente();

         $periodo->id_contribuyente=intval($params['id_contribuyente']);
         $periodo->fecha_inicio=$fecha;
         $periodo->id_regimen_ib=intval($params['id_regimen_ib']);
         $periodo->numero_de_ib=$params['numero_de_ib'];
         $periodo->fecha_de_actualizacion=Carbon::now();

         $periodo->save();
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
        $params = array();
        parse_str($request->data, $params);

        $fecha=Carbon::createFromFormat('d-m-Y', $params['fecha_actividad_contribuyente'])->toDateTimeString();

        $periodo= PeriodoActividadContribuyente::find($id);

        $periodo->id_contribuyente=intval($params['id_contribuyente']);
        $periodo->fecha_inicio=$fecha;
        $periodo->id_regimen_ib=intval($params['id_regimen_ib']);
        $periodo->numero_de_ib=$params['numero_de_ib'];
        $periodo->fecha_de_actualizacion=Carbon::now();

        $periodo->save();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updatePeriodo(Request $request)
    {
        $params = array();
         parse_str($request->data, $params);

         dd($params);

         $fecha=Carbon::createFromFormat('d-m-Y', $params['fecha_actividad_contribuyente'])->toDateTimeString();

         $periodo= PeriodoActividadContribuyente::where('id_contribuyente',$params['id_contribuyente'])->find();

         $periodo->id_contribuyente=intval($params['id_contribuyente']);
         $periodo->fecha_inicio=$fecha;
         $periodo->id_regimen_ib=intval($params['id_regimen_ib']);
         $periodo->numero_de_ib=$params['numero_de_ib'];
         $periodo->fecha_de_actualizacion=Carbon::now();

         $periodo->save();
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
