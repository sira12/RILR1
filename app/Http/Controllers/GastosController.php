<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class GastosController extends Controller
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

    public function getGastos(Request $request)
    {
        $gastos = DB::table('egreso')->where('activo', "S")->get();

        return response()->json($gastos);
    }

    public function getDevengados(Request $request){


       $response= DB::table('rel_industria_egreso')
                ->join('egreso', 'rel_industria_egreso.id_egreso', '=', 'egreso.id_egreso')
                ->where('id_rel_industria_egreso', intval($request->id)) //es el id_industira
                ->select(
                    'rel_industria_egreso.*',
                    'egreso.egreso',
                    
                )
                ->get();

        return response()->json($response);


    }
    public function saveDevengados(Request $request)
    {

        $params = [];
        parse_str($request->data, $params);

        $id_industria = intval($request->id_industria);



        $date = Carbon::now()->format('Y'); //2021
        $status = 200;


        $i = 0;

        foreach ($params['id_gasto'] as $valor) {

            $id = DB::table('rel_industria_egreso')->insertGetId([
                'id_industria' => $id_industria,
                'id_egreso' => intval($valor),
                'importe' => intval($params['costo_gasto'][$i]),
                'anio' => $date,
                'fecha_de_actualizacion'=>Carbon::now()
            ]);


            $i++;
        }

        $msg = "¡Datos Guardados exitosamente!";

        return response()->json(array('status' => $status, 'msg' => $msg), 200);
    }

    public function updateDevengados(Request $request)
    {

        $params = [];
        parse_str($request->data, $params);

        $id_industria = intval($request->id_industria);

       

        $date = Carbon::now()->format('Y'); //2021
        $status = 200;


        $i = 0;

        foreach ($params['id_egreso'] as $valor) {

            $id = DB::table('rel_industria_egreso') ->where('id_rel_industria_egreso', intval($params['id_rel_industria_devengados_update']))
            ->update([
                'id_industria' => $id_industria,
                'id_egreso' => intval($valor),
                'importe' => intval($params['costo_egreso'][$i]),
                'anio' => $date,
                'fecha_de_actualizacion'=>Carbon::now()
            ]);


            $i++;
        }

        $msg = "¡Datos Actualizados exitosamente!";

        return response()->json(array('status' => $status, 'msg' => $msg), 200);
    }

    public function listRelGastos (Request $request){
        
        if ($request->ajax()) {
            $data = DB::table('rel_industria_egreso')
                ->join('egreso', 'rel_industria_egreso.id_egreso', '=', 'egreso.id_egreso')
                ->where('id_industria', intval($request->id_industria)) //es el id_industira
                ->select(
                    'rel_industria_egreso.*',
                    'egreso.egreso',
                    
                )
                ->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $actionBtn = '<span style="cursor: pointer;" data-placement="left" title="Ver Servicio" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalDetalleServicio" data-backdrop="static" data-keyboard="false" onClick="VerServicioAsignado('.$row->id_egreso.',\'' . "gastos" . '\')"><i class="mdi mdi-eye font-22 text-danger"></i></span>

                    <span style="cursor: pointer;" data-placement="left" title="Actualizar Egreso" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalUpdateDevengado" data-backdrop="static" data-keyboard="false" onClick="UpdateDevengadoAsignado('.$row->id_egreso.')"><i class="mdi mdi-table-edit font-22 text-danger"></i></span>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
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
