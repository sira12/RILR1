<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;

class SituacionPlantaController extends Controller
{

    public function saveSituacion( Request $request){

        $params=[];

        parse_str($request->data, $params); 

        $id_industria = intval($request->id_industria);
        $date = Carbon::now()->format('Y'); //2021
        $status = 200;


        if(DB::table('situacion_de_planta')->insert([
            'id_industria' => $id_industria,
            'produccion_sobre_capacidad' => intval($params['produccion_sobre_capacidad']),
            'superficie_lote' => intval($params['superficie_lote']),
            'superficie_planta' => intval($params['superficie_planta']),
            'es_zona_industrial' =>  $params['es_zona_industrial'],
            'inversion_anual' =>isset($params['inversion_anual']) ? intval($params['inversion_anual']) : null,
            'inversion_activo_fijo' => isset($params['inversion_activo_fijo']) ? intval($params['inversion_activo_fijo']) : null,
            'capacidad_instalada' => intval($params['capacidad_instalada']) ,
            'capacidad_ociosa' => intval($params['capacidad_ociosa']),
            'anio' => $date,
            'fecha_actualizacion' => Carbon::now(),
        ])){

            $msg = "¡Datos Guardados exitosamente!";

        }else{
            $msg = "¡Error al guardar situacion de planta!";
            $status = 1;
        }

        

        return response()->json(array('status' => $status, 'msg' => $msg), 200);

    }

    public function listRelPlanta (Request $request){

        if ($request->ajax()) {
            $data = DB::table('situacion_de_planta')
                ->where('id_industria', intval($request->id_industria)) //es el id_industira
                ->select(
                    'situacion_de_planta.*',
                )
                ->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $actionBtn = '<span style="cursor: pointer;" data-placement="left" title="Ver Situación" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalDetalleSituacion" data-backdrop="static" data-keyboard="false" onClick="VerSituacion('.$row->id_situacion_de_planta.')"><i class="mdi mdi-eye font-22 text-danger"></i></span>

                    <span style="cursor: pointer;" data-placement="left" title="Actualizar Situación" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalSituacion" data-backdrop="static" data-keyboard="false" onClick="UpdateSituacion('.$row->id_situacion_de_planta.');"><i class="mdi mdi-table-edit font-22 text-danger"></i></span>

                    <span style="cursor: pointer;" title="Eliminar Situación" onClick="EliminarSituacion('.$row->id_situacion_de_planta.')"><i class="mdi mdi-delete font-22 text-danger"></i></span>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }


    public function getSituacion(Request $request)
    {
        $sp=DB::table('situacion_de_planta')
                ->where('id_industria', intval($request->id)) //es el id_industira
                ->get();

        return response()->json($sp);
    }



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
