<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;

class SituacionPlantaController extends Controller
{

    public function saveSituacion(Request $request)
    {

        $params = [];

        parse_str($request->data, $params);

        $id_industria = intval($request->id_industria);
        //$date = Carbon::now()->format('Y'); //2021
        $status = 200;
        $periodo_fiscal = $request->p_f;


        if (DB::table('situacion_de_planta')->insert([
            'id_industria' => $id_industria,
            'produccion_sobre_capacidad' => intval($params['produccion_sobre_capacidad']),
            'superficie_lote' => intval($params['superficie_lote']),
            'superficie_planta' => intval($params['superficie_planta']),
            'es_zona_industrial' =>  $params['es_zona_industrial'],
            'inversion_anual' => isset($params['inversion_anual']) ? intval($params['inversion_anual']) : null,
            'inversion_activo_fijo' => isset($params['inversion_activo_fijo']) ? intval($params['inversion_activo_fijo']) : null,
            'capacidad_instalada' => intval($params['capacidad_instalada']),
            'capacidad_ociosa' => intval($params['capacidad_ociosa']),
            'anio' => $periodo_fiscal,
            'fecha_actualizacion' => Carbon::now(),
        ])) {

            $msg = "¡Datos Guardados exitosamente!";
        } else {
            $msg = "¡Error al guardar situacion de planta!";
            $status = 1;
        }



        return response()->json(array('status' => $status, 'msg' => $msg), 200);
    }


    public function updatesituacion(Request $request)
    {

        $params = [];

        parse_str($request->data, $params);

        $id_industria = intval($request->id_industria);
        //$date = Carbon::now()->format('Y'); //2021
        $status = 200;
        $periodo_fiscal = $request->p_f;


        if (DB::table('situacion_de_planta')
            ->where('id_situacion_de_planta', intval($params['id_situacion_de_planta']))
            ->update([
                'id_industria' => $id_industria,
                'produccion_sobre_capacidad' => intval($params['produccion_sobre_capacidad']),
                'superficie_lote' => intval($params['superficie_lote']),
                'superficie_planta' => intval($params['superficie_planta']),
                'es_zona_industrial' =>  $params['es_zona_industrial'],
                'inversion_anual' => isset($params['inversion_anual']) ? intval($params['inversion_anual']) : null,
                'inversion_activo_fijo' => isset($params['inversion_activo_fijo']) ? intval($params['inversion_activo_fijo']) : null,
                'capacidad_instalada' => intval($params['capacidad_instalada']),
                'capacidad_ociosa' => intval($params['capacidad_ociosa']),
                //'anio' => $date, no se tiene en cuenta, solo actualiza datos
                'fecha_actualizacion' => Carbon::now(),
            ])
        ) {

            $msg = "¡Datos Actualizados exitosamente!";
        } else {
            $msg = "¡Error al guardar situacion de planta!";
            $status = 1;
        }



        return response()->json(array('status' => $status, 'msg' => $msg), 200);
    }

    public function deleteSituacion(Request $request)
    {

        if (DB::table('situacion_de_planta')
            ->where('id_situacion_de_planta', intval($request->id))
            ->delete()
        ) {
            return response()->json(array('status' => 200), 200);
        }
    }

    public function listRelPlanta(Request $request)
    {

        if ($request->ajax()) {
            $data = DB::table('situacion_de_planta')
                ->where('id_industria', intval($request->id_industria)) //es el id_industira
                ->where('anio', $request->p_f)
                ->select(
                    'situacion_de_planta.*',
                )
                ->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $actionBtn = '<span style="cursor: pointer;" data-placement="left" title="Ver Situación" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalDetalleSituacion" data-backdrop="static" data-keyboard="false" onClick="VerSituacion(' . $row->id_situacion_de_planta . ')"><i class="mdi mdi-eye font-22 text-danger"></i></span>

                    <span style="cursor: pointer;" data-placement="left" title="Actualizar Situación" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalSituacion" data-backdrop="static" data-keyboard="false" onClick="UpdateSituacion(' . $row->id_situacion_de_planta . ');"><i class="mdi mdi-table-edit font-22 text-danger"></i></span>

                    <span style="cursor: pointer;" title="Eliminar Situación" onClick="EliminarSituacion(' . $row->id_situacion_de_planta . ')"><i class="mdi mdi-delete font-22 text-danger"></i></span>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }


    public function getSituacion(Request $request)
    {


        $sp = DB::table('situacion_de_planta')
            ->where('id_situacion_de_planta', intval($request->id)) //es el id_industira
            ->get();

        return response()->json($sp);
    }

    public function getMotivo(Request $request)
    {
        $m = DB::table('rel_industria_motivo_ociosidad')
            ->select(

                'rel_industria_motivo_ociosidad.*',
                'motivo_ociosidad.motivo_ociosidad'


            )
            ->join('motivo_ociosidad', 'rel_industria_motivo_ociosidad.id_motivo_ociosidad', '=', 'motivo_ociosidad.id_motivo_ociosidad')
            ->where('id_rel_industria_motivo_ociosidad', intval($request->id))->get();

        return response()->json($m);
    }

    public function traeMotivos()
    {
        $m = DB::table('motivo_ociosidad')->where('activo', 'S')->get();

        return response()->json($m);
    }

    public function saveMotivo(Request $request)
    {
        $params = [];
        parse_str($request->data, $params);

        $id_industria = intval($request->id_industria);
        $status = 200;
        $periodo_fiscal = $request->p_f;


        $id = 0;

        //comprobaciones

        $motivos_existentes = DB::table('rel_industria_motivo_ociosidad')
            ->where('id_industria', $id_industria)
            ->where('id_motivo_ociosidad', intval($params['id_motivo_ociosidad']))
            ->where('anio', $periodo_fiscal)
            ->get();





        if (isset($params['check_otro']) && $params['check_otro'] == "true") {

            $id = DB::table('motivo_ociosidad')->insertGetId([
                'motivo_ociosidad' => $params['motivo_nuevo'],
                'activo' => 'S'
            ]);
        } else {
            $id = intval($params['id_motivo_ociosidad']);
        }




        if (count($motivos_existentes) > 0) {

            $msg = "Ya existe el motivo de ociosidad para la industria!";
            $status = 1;
        } else {
            if (DB::table('rel_industria_motivo_ociosidad')->insert([
                'id_industria' => $id_industria,
                'id_motivo_ociosidad' => $id,
                'anio' => $periodo_fiscal,
                'fecha_de_actualizacion' => Carbon::now()
            ])) {

                $msg = "¡Datos Guardados exitosamente!";
            } else {
                $msg = "¡Error!";
                $status = 1;
            }
        }

        return response()->json(array('status' => $status, 'msg' => $msg), 200);
    }


    public function listRelMotivo(Request $request)
    {

        if ($request->ajax()) {
            $data = DB::table('rel_industria_motivo_ociosidad')
                ->where('id_industria', intval($request->id_industria)) //es el id_industira
                ->join('motivo_ociosidad', 'rel_industria_motivo_ociosidad.id_motivo_ociosidad', '=', 'motivo_ociosidad.id_motivo_ociosidad')
                ->where('anio', $request->p_f)
                ->select(
                    'rel_industria_motivo_ociosidad.*',
                    'motivo_ociosidad.motivo_ociosidad'
                )
                ->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $actionBtn = '<span style="cursor: pointer;" data-placement="left" title="Ver Motivo Ociosidad" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalDetalleMotivo" data-backdrop="static" data-keyboard="false" onClick="VerMotivo(' . $row->id_rel_industria_motivo_ociosidad . ')"><i class="mdi mdi-eye font-22 text-danger"></i></span>

                    <span style="cursor: pointer;" data-placement="left" title="Actualizar Motivo Ociosidad" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalMotivo" data-backdrop="static" data-keyboard="false" onClick="UpdateMotivo(' . $row->id_rel_industria_motivo_ociosidad . ')"><i class="mdi mdi-table-edit font-22 text-danger"></i></span>

                    <span style="cursor: pointer;" title="Eliminar Motivo Ociosidad" onClick="EliminarMotivo(' . $row->id_rel_industria_motivo_ociosidad . ')"><i class="mdi mdi-delete font-22 text-danger"></i></span>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function updateMotivo(Request $request)
    {
        $params = [];
        parse_str($request->data, $params);

        $id_industria = intval($request->id_industria);
        //$date = Carbon::now()->format('Y'); //2021
        $status = 200;
        $periodo_fiscal = $request->p_f;

        $id = 0;
        //comprobaciones

        $motivos_existentes = DB::table('rel_industria_motivo_ociosidad')
            ->where('id_industria', $id_industria)
            ->where('id_motivo_ociosidad', intval($params['id_motivo_ociosidad']))
            ->where('id_rel_industria_motivo_ociosidad', '!=', intval($params['id_rel_industria_motivo_ociosidad']))
            ->where('anio', $periodo_fiscal)
            ->get();



        if (isset($params['check_otro']) && $params['check_otro'] == "true") {
            $id = DB::table('motivo_ociosidad')->insertGetId([
                'motivo_ociosidad' => $params['motivo_nuevo'],
                'activo' => 'S'

            ]);
        } else {

            $id = intval($params['id_motivo_ociosidad']);
        }


        if (count($motivos_existentes) > 0) {

            $msg = "Ya existe el motivo de ociosidad para la industria!";
            $status = 1;
        } else {

            if (DB::table('rel_industria_motivo_ociosidad')
                ->where('id_rel_industria_motivo_ociosidad', intval($params['id_rel_industria_motivo_ociosidad']))
                ->update([
                    'id_industria' => $id_industria,
                    'id_motivo_ociosidad' => $id,
                    //'anio' => $date,
                    'fecha_de_actualizacion' => Carbon::now()
                ])
            ) {

                $msg = "¡Datos Actualizados exitosamente!";
            } else {
                $msg = "¡Error!";
                $status = 1;
            }
        }


        return response()->json(array('status' => $status, 'msg' => $msg), 200);
    }

    public function deleteRelMotivo(Request $request)
    {

        if (DB::table('rel_industria_motivo_ociosidad')
            ->where('id_rel_industria_motivo_ociosidad', intval($request->id))
            ->delete()
        ) {
            return response()->json(array('status' => 200), 200);
        }
    }


    public function getRolTrabajadores(Request $request)
    {
        //trae roles de trabajador
        $r = DB::table('rol_trabajador')->where('activo', 'S')->get();

        return response()->json($r);
    }


    public function getCondicionLaboral(Request $request)
    {
        //trae roles de trabajador
        $r = DB::table('condicion_laboral')->where('activo', 'S')->get();

        return response()->json($r);
    }


    public function savePersonalOcupado(Request $request)
    {


        $params = [];

        parse_str($request->data, $params);
        $id_industria = intval($request->id_industria);
        //$date = Carbon::now()->format('Y'); //2021
        $status = 200;
        $periodo_fiscal = $request->p_f;



        $i = 0;

        $f = 0;

        $m = 0;

        //anotacion: la comprobacion debe ser con el periodo de actividad, pero todavia no esta hecho,por lo tanto se setea 2021
        $rol_existente = DB::table('rel_industria_trabajador')
            ->where('id_rol_trabajador', intval($params['rol_trabajador']))
            ->where('anio', $periodo_fiscal)
            ->where('id_industria', $id_industria)
            ->get();

        if (count($rol_existente) > 0) {
            $msg = "¡Ya existe el rol seleccionado para esta industria en este periodo!";
            $status = 1;
        } else {
            foreach ($params['id_condicion_laboral'] as $condicion) {

                if (isset($params['masculino'][$i])) {

                    if (DB::table('rel_industria_trabajador')->insert([

                        'id_industria' => $id_industria,
                        'id_rol_trabajador' => intval($params['rol_trabajador']),
                        'id_condicion_laboral' => intval($condicion),
                        'sexo' => "M",
                        'numero_de_trabajadores' => intval($params['masculino'][$i]),
                        'anio' => $periodo_fiscal,
                        'fecha_de_actualizacion' => Carbon::now()

                    ])) {
                        $m = 1;
                    }
                }


                if (isset($params['femenino'][$i])) {
                    if (DB::table('rel_industria_trabajador')->insert([

                        'id_industria' => $id_industria,
                        'id_rol_trabajador' => intval($params['rol_trabajador']),
                        'id_condicion_laboral' => intval($condicion),
                        'sexo' => "F",
                        'numero_de_trabajadores' => intval($params['femenino'][$i]),
                        'anio' => $periodo_fiscal,
                        'fecha_de_actualizacion' => Carbon::now()

                    ])) {

                        $f = 1;
                    }
                }


                $i++;
            }

            //mensaje
            if ($m == 1 && $f == 1) {

                $msg = "¡Datos Guardados Exitosamente!";
            } else {
                $msg = "¡Error al guardar el personal ocupado!";
                $status = 1;
            }
        }
        return response()->json(array('status' => $status, 'msg' => $msg), 200);
    }


    public function listRelTrabajador(Request $request)
    {


        if ($request->ajax()) {
            $data = DB::table('rel_industria_trabajador')
                ->join('rol_trabajador', 'rel_industria_trabajador.id_rol_trabajador', 'rol_trabajador.id_rol_trabajador')
                ->join('condicion_laboral', 'rel_industria_trabajador.id_condicion_laboral', 'condicion_laboral.id_condicion_laboral')
                ->select(
                    'rel_industria_trabajador.*',
                    'rol_trabajador.rol_trabajador',
                    'condicion_laboral.condicion_laboral'

                )
                ->where('id_industria', '=', intval($request->id_industria))
                ->where('anio',$request->p_f)
                ->where('sexo', "M")

                ->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $actionBtn = '<span style="cursor: pointer;" data-placement="left" title="Ver Personal Ocupado" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalDetallePersonal" data-backdrop="static" data-keyboard="false" onClick="VerPersonal(' . $row->id_rel_industria_trabajadores . ')"><i class="mdi mdi-eye font-22 text-danger"></i></span>

                    <span style="cursor: pointer;" data-placement="left" title="Actualizar Personal Ocupado" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalUpdatePersonal" data-backdrop="static" data-keyboard="false" onClick="UpdatePersonal(' . $row->id_rel_industria_trabajadores . ')"><i class="mdi mdi-table-edit font-22 text-danger"></i></span>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }


    public function listRelTrabajadorF(Request $request)
    {


        if ($request->ajax()) {
            $data = DB::table('rel_industria_trabajador')
                ->join('rol_trabajador', 'rel_industria_trabajador.id_rol_trabajador', 'rol_trabajador.id_rol_trabajador')
                ->join('condicion_laboral', 'rel_industria_trabajador.id_condicion_laboral', 'condicion_laboral.id_condicion_laboral')
                ->select(
                    'rel_industria_trabajador.*',
                    'rol_trabajador.rol_trabajador',
                    'condicion_laboral.condicion_laboral'

                )
                ->where('id_industria', '=', intval($request->id_industria))
                ->where('anio',$request->p_f)
                ->where('sexo', "F")

                ->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $actionBtn = '<span style="cursor: pointer;" data-placement="left" title="Ver Personal Ocupado" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalDetallePersonal" data-backdrop="static" data-keyboard="false" onClick="VerPersonal(' . $row->id_rel_industria_trabajadores . ')"><i class="mdi mdi-eye font-22 text-danger"></i></span>

                    <span style="cursor: pointer;" data-placement="left" title="Actualizar Personal Ocupado" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalUpdatePersonal" data-backdrop="static" data-keyboard="false" onClick="UpdatePersonal(' . $row->id_rel_industria_trabajadores . ')"><i class="mdi mdi-table-edit font-22 text-danger"></i></span>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }


    public function getRelPersonal(Request $request)
    {



        $r = DB::table('rel_industria_trabajador')
            ->join('rol_trabajador', 'rel_industria_trabajador.id_rol_trabajador', 'rol_trabajador.id_rol_trabajador')
            ->join('condicion_laboral', 'rel_industria_trabajador.id_condicion_laboral', 'condicion_laboral.id_condicion_laboral')
            ->select(
                'rel_industria_trabajador.*',
                'rol_trabajador.rol_trabajador',
                'condicion_laboral.condicion_laboral'

            )
            ->where('id_rel_industria_trabajadores', '=', intval($request->id))
            ->get();

        return response()->json($r);
    }

    public function updateRelPersonal(Request $request)
    {


        $params = [];

        parse_str($request->data, $params);
        $id_industria = intval($request->id_industria);
        $date = Carbon::now()->format('Y'); //2021
        $status = 200;
        $periodo_fiscal= $request->p_f;

        $i = 0;

        $f = 0;

        $m = 0;


        $sexo = isset($params['masculino']) ? "masculino" : "femenino";

        foreach ($params['id_condicion_laboral'] as $condicion) {



            if (DB::table('rel_industria_trabajador')
                ->where('id_rel_industria_trabajadores', intval($params['id_rel_industria_personal_update']))
                ->update([

                    'id_industria' => $id_industria,
                    //'id_rol_trabajador' => intval($params['rol_trabajador']),
                    'id_condicion_laboral' => intval($condicion),
                    //'sexo' => "M",
                    'numero_de_trabajadores' => intval($params[$sexo][$i]),
                    //'anio' => $date,
                    'fecha_de_actualizacion' => Carbon::now()

                ])
            ) {
                $m = 1;
            }

            $i++;
        }

        //mensaje
        if ($m == 1) {

            $msg = "¡Datos Actualizados Exitosamente!";
        } else {
            $msg = "¡Error al Actualizar el personal ocupado!";
            $status = 1;
        }

        return response()->json(array('status' => $status, 'msg' => $msg), 200);
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
