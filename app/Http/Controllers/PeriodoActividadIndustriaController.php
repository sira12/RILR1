<?php

namespace App\Http\Controllers;

use App\Models\PeriodoActividadIndustria;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PeriodoActividadIndustriaController extends Controller
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $params = array();
        parse_str($request->data, $params);
        $periodo_industria=new PeriodoActividadIndustria();
        $fecha=Carbon::createFromFormat('d-m-Y', $params['fecha_actividad_industria'])->toDateTimeString();

        $periodo_industria->id_industria=$id;
        $periodo_industria->fecha_de_inicio=$fecha;

        if( $periodo_industria->save()){
            return $periodo_industria->id_periodo_de_actividad_de_industria;
        }else{
            return "error";
        }
        

         
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

        $periodo_industria=PeriodoActividadIndustria::where('id_industria',$id)->first();

        $fecha=Carbon::createFromFormat('d-m-Y', $params['fecha_actividad_industria'])->toDateTimeString();

        $periodo_industria->id_industria=$id;
        $periodo_industria->fecha_de_inicio=$fecha;

        $periodo_industria->save();
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
