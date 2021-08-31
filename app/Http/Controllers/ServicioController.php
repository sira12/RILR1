<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;
use App\Models\Servicio;

class ServicioController extends Controller
{
   


    //saca frecuencia
    public function frecuencia()
    {
        $fr = DB::table('frecuencia_de_contratacion')->get();

        $response = array();
        foreach ($fr as $f) {
            $response[] = array("value" => $f->id_frecuencia_de_contratacion, "label" => trim($f->frecuencia_de_contratacion));
        }

        return response()->json($response);
    }

    

    

    public function getServicio(Request $request)
    {


        $servicio = DB::table('rel_industria_servicio')->where('id_rel_industria_servicio', $request->id)
            ->join('servicio', 'rel_industria_servicio.id_servicio', '=', 'servicio.id_servicio')
            ->leftjoin('unidad_de_medida', 'rel_industria_servicio.id_unidad_de_medida','unidad_de_medida.id_unidad_de_medida')
            ->join('frecuencia_de_contratacion', 'rel_industria_servicio.id_frecuencia_de_contratacion', '=', 'frecuencia_de_contratacion.id_frecuencia_de_contratacion')
            ->join('pais', 'rel_industria_servicio.id_pais', 'pais.id_pais')
            ->join('localidad', 'rel_industria_servicio.id_localidad', 'localidad.id_localidad')
            ->join('provincia', 'localidad.id_provincia', 'provincia.id_provincia')
            ->leftjoin('motivo_importacion','rel_industria_servicio.id_motivo_importacion','motivo_importacion.id_motivo_importacion')
            ->select(
                'rel_industria_servicio.*',
                'servicio.servicio',
                'pais.pais',
                'localidad.localidad',
                'provincia.provincia',
                'provincia.id_provincia',
                'unidad_de_medida.unidad_de_medida',
                'motivo_importacion.motivo_importacion'
            )
            ->get();

        return response()->json($servicio);
    }

    public function store_servicio(Request $request)
    {
        $params = [];
        parse_str($request->data, $params);

        //comprobar si el servicio existe; si existe se devuelve id del insumo
        $result = Servicio::where('servicio', $params['search_servicio_otros'])->get();

        if (count($result) >= 1) {
            //devulvo id
            $response = $result[0]['id_servicio'];
        } else {
            //si no existe guardarlo
            $servicio = new Servicio();

            $servicio->servicio = $params['search_servicio_otros'];
            $servicio->id_clasificacion_servicio = 4;
            $servicio->activo = "S";

            $servicio->save();
            //devuelvo id
            $response = $servicio->id_servicio;
        }

        return $response;
    }


    public function saveRelServicio(Request $request)
    {
        $params = [];
        parse_str($request->data, $params);

        $id_industria = intval($request->id_industria);

        $status = 200;
        $periodo_fiscal= $request->p_f;

        if ($params['proceso'] == "savecombustible") {
            //comprobaciones: si ya se cargó;
            //comprobaciones
            $ser_existente = DB::table('rel_industria_servicio')
                ->where('id_industria', $id_industria)
                ->where('id_servicio',  intval($params['id_servicio_combustible']))
                ->where('anio',$periodo_fiscal)
                ->get();

            //si el insumo ya esta cargado para esta industria devolver msj
            if (count($ser_existente) > 0) {
                $msg = "¡Este combustible ya se encuentra cargado para esta industria!";
                $status = 1;
            } else {

                $id_rel_servicio_industria = DB::table('rel_industria_servicio')->insertGetId([
                    'id_industria' => $id_industria,
                    'id_servicio' => intval($params['id_servicio_combustible']),
                    'id_frecuencia_de_contratacion' => 1,
                    'costo' => intval($params['costo_combustible']),
                    'id_localidad' =>  intval($params['id_localidad_combustible']),
                    'id_pais' => intval($params['id_pais_combustible']),
                    'id_unidad_de_medida' => intval($params['medida_combustible']),
                    'id_motivo_importacion' => isset($params['motivo_importacion_combustible']) && $params['motivo_importacion_combustible'] != "" ? intval($params['motivo_importacion_combustible']) : null,
                    'detalles' => isset($params['detalles_combustible']) ? $params['detalles_combustible'] : "",
                    'cantidad_consumida' => 0,
                    'anio' => $periodo_fiscal,
                    'fecha_de_actualizacion' => Carbon::now(),
                ]);

                $msg = "¡Datos Guardados exitosamente!";
            }
        } elseif ($params['proceso'] == "saveotros") {

            
            //si el id del insumo viene vacio significa que no encontró el insumo, por lo tanto hay que cargarlo
            if ($params['id_servicio_otros'] == "") {
                $servicio = new ServicioController();
                $id_servicio = $servicio->store_servicio($request);
            } else {
                $id_servicio = intval($params['id_servicio_otros']);
            }



            //comprobaciones
            $ser_existente = DB::table('rel_industria_servicio')
                ->where('id_industria', $id_industria)
                ->where('id_servicio',  $id_servicio)
                ->where('anio',$periodo_fiscal)
                ->get();

            if (count($ser_existente) > 0) {
                $msg = "¡Este servicio ya se encuentra cargado para esta industria!";
                $status = 1;
            } else {


                $id = DB::table('rel_industria_servicio')->insertGetId([
                    'id_industria' => $id_industria,
                    'id_servicio' => $id_servicio,
                    'id_frecuencia_de_contratacion' => 1,
                    'costo' => intval($params['costo_otros']),
                    'id_localidad' =>  intval($params['id_localidad_otros']),
                    'id_pais' => intval($params['id_pais_otros']),
                    'id_motivo_importacion' => intval($params['motivo_importacion_otros']),
                    'detalles' => isset($params['detalles_otros']) ? $params['detalles_otros'] : "",
                    'cantidad_consumida' => intval($params['cantidad_otros']),
                    'id_frecuencia_de_contratacion'=> intval($params['frecuencia_otros']),
                    'anio' => $periodo_fiscal,
                    'fecha_de_actualizacion' => Carbon::now(),
                    'id_unidad_de_medida' => null
                ]);
                $msg = "¡Datos Guardados exitosamente!";
            }
        } elseif ($params['proceso'] == "saveserviciobasico") {
            $i = 0;

            $pais_localidad = DB::table('industria')
                ->where('id_industria', $id_industria)
                ->join('localidad', 'industria.id_localidad', 'localidad.id_localidad')
                ->join('provincia', 'localidad.id_provincia', 'provincia.id_provincia')
                ->join('pais', 'provincia.id_pais', 'pais.id_pais')
                ->select(
                    'industria.id_localidad',
                    'pais.id_pais'
                )
                ->get();

            $pais = $pais_localidad[0]->id_pais;
            $localidad = $pais_localidad[0]->id_localidad;
            $motivo = null;
            $detalles = null;


            foreach ($params['id_servicio_basico'] as $valor) {

                $id = DB::table('rel_industria_servicio')->insertGetId([
                    'id_industria' => $id_industria,
                    'id_servicio' => intval($valor),
                    'id_frecuencia_de_contratacion' => 1,
                    'id_localidad' =>  $localidad,
                    'id_pais' => $pais,
                    'id_motivo_importacion' => $motivo,
                    'detalles' => $detalles,
                    'cantidad_consumida' => intval($params['costo_basico'][$i]), //en servicios basicos se utiliza la cantidad consumida y el parametro es el costo_basico
                    'anio' => $periodo_fiscal,
                    'fecha_de_actualizacion' => Carbon::now(),
                    'id_unidad_de_medida' => null
                ]);


                $i++;
            }

            $msg = "¡Datos Guardados exitosamente!";
        }

        return response()->json(array('status' => $status, 'msg' => $msg), 200);
    }

    public function updateRelServicio(Request $request)
    {
        $params = [];
        parse_str($request->data, $params);


        $id_industria = intval($request->id_industria);


        $date = Carbon::now()->format('Y');
        $status = 200;
        $periodo_fiscal= $request->p_f;



        if ($params['proceso'] == "savecombustible") {
            //comprobaciones: si ya se cargó;
            //comprobaciones
            $ser_existente = DB::table('rel_industria_servicio')
                ->where('id_industria', $id_industria)
                ->where('id_servicio',  intval($params['id_servicio_combustible']))
                ->where('id_rel_industria_servicio', '!=', intval($params['id_rel_industria_combustible']))
                ->where('anio',$periodo_fiscal)
                ->get();

            //si el insumo ya esta cargado para esta industria devolver msj
            if (count($ser_existente) > 0) {
                $msg = "¡Este combustible ya se encuentra cargado para esta industria!";
                $status = 1;
            } else {


                $id_rel_producto_actividad = DB::table('rel_industria_servicio')
                    ->where('id_rel_industria_servicio', intval($params['id_rel_industria_combustible']))
                    ->update([
                        'id_industria' => $id_industria,
                        'id_servicio' => intval($params['id_servicio_combustible']),
                        'id_frecuencia_de_contratacion' => 1,
                        'costo' => intval($params['costo_combustible']),
                        'id_localidad' =>  intval($params['id_localidad_combustible']),
                        'id_pais' => intval($params['id_pais_combustible']),
                        'id_unidad_de_medida' => intval($params['medida_combustible']),
                        'id_motivo_importacion' => isset($params['motivo_importacion_combustible']) && $params['motivo_importacion_combustible'] != "" ? intval($params['motivo_importacion_combustible']) : null,
                        'detalles' => isset($params['detalles_combustible']) ? $params['detalles_combustible'] : "",

                        'fecha_de_actualizacion' => Carbon::now(),
                    ]);



                $msg = "¡Datos Guardados exitosamente!";
            }
        } elseif ($params['proceso'] == "saveotros") {


            //si el id del insumo viene vacio significa que no encontró el insumo, por lo tanto hay que cargarlo
            if ($params['id_servicio_otros'] == "") {
                $servicio = new ServicioController();
                $id_servicio = $servicio->store_servicio($request);
            } else {
                $id_servicio = intval($params['id_servicio_otros']);
            }


            //comprobaciones
            $ser_existente = DB::table('rel_industria_servicio')
                ->where('id_industria', $id_industria)
                ->where('id_servicio',  $id_servicio)
                ->where('id_rel_industria_servicio', '!=', intval($params['id_rel_industria_otros']))
                ->where('anio',$periodo_fiscal)
                ->get();

            if (count($ser_existente) > 0) {
                $msg = "¡Este servicio ya se encuentra cargado para esta industria!";
                $status = 1;
            } else {


                $id = DB::table('rel_industria_servicio')
                    ->where('id_rel_industria_servicio', intval($params['id_rel_industria_otros']))
                    ->update([
                        'id_industria' => $id_industria,
                        'id_servicio' => $id_servicio,
                        'id_frecuencia_de_contratacion' => 1,
                        'costo' => intval($params['costo_otros']),
                        'id_localidad' =>  intval($params['id_localidad_otros']),
                        'id_pais' => intval($params['id_pais_otros']),
                        'id_motivo_importacion' => intval($params['motivo_importacion_otros']),
                        'detalles' => isset($params['detalles_otros']) ? $params['detalles_otros'] : "",
                        'cantidad_consumida' => intval($params['cantidad_otros']),
                        'id_frecuencia_de_contratacion'=> intval($params['frecuencia_otros']),
                        'fecha_de_actualizacion' => Carbon::now(),
                        'id_unidad_de_medida' => null
                    ]);
                $msg = "¡Datos Actualizados exitosamente!";
            }
        } elseif ($params['proceso'] == "updateserviciobasico") {


            $i = 0;

            $pais_localidad = DB::table('industria')
                ->where('id_industria', $id_industria)
                ->join('localidad', 'industria.id_localidad', 'localidad.id_localidad')
                ->join('provincia', 'localidad.id_provincia', 'provincia.id_provincia')
                ->join('pais', 'provincia.id_pais', 'pais.id_pais')
                ->select(
                    'industria.id_localidad',
                    'pais.id_pais'
                )
                ->get();

            $pais = $pais_localidad[0]->id_pais;
            $localidad = $pais_localidad[0]->id_localidad;
            $motivo = null;
            $detalles = null;


            foreach ($params['id_servicio_basico'] as $valor) {

                $id = DB::table('rel_industria_servicio')->where('id_rel_industria_servicio', intval($params['id_rel_industria_servicios_basicos']))
                    ->update([
                        'id_industria' => $id_industria,
                        'id_servicio' => intval($valor),
                        'id_frecuencia_de_contratacion' => 1,
                        'cantidad_consumida' => intval($params['costo_basico'][$i]), //en servicios basicos se utiliza la cantidad consumida
                        'id_localidad' =>  $localidad,
                        'id_pais' => $pais,
                        'id_motivo_importacion' => $motivo,
                        'detalles' => $detalles,
                        
                        'fecha_de_actualizacion' => Carbon::now(),
                        'id_unidad_de_medida' => null
                    ]);


                $i++;
            }

            $msg = "¡Datos atualizados exitosamente!";
        }

        return response()->json(array('status' => $status, 'msg' => $msg), 200);
    }

    public function deleteRelServicio(Request $request)
    {

        if (DB::table('rel_industria_servicio')->where('id_rel_industria_servicio', intval($request->id))->delete()) {
            return response()->json(array('status' => 200), 200);
        }
    }

    public function listRelcombustible(Request $request)
    {

        if ($request->ajax()) {
            $data = DB::table('rel_industria_servicio')
                ->join('servicio', 'rel_industria_servicio.id_servicio', '=', 'servicio.id_servicio')
                ->join('unidad_de_medida', 'rel_industria_servicio.id_unidad_de_medida', '=', 'unidad_de_medida.id_unidad_de_medida')
                ->join('frecuencia_de_contratacion', 'rel_industria_servicio.id_frecuencia_de_contratacion', '=', 'frecuencia_de_contratacion.id_frecuencia_de_contratacion')
                ->where('id_industria', intval($request->id_industria)) //es el id_industira
                ->where('servicio.id_clasificacion_servicio', 2)
                ->where('anio',$request->p_f)
                ->select(
                    'rel_industria_servicio.*',
                    'frecuencia_de_contratacion.frecuencia_de_contratacion as frecuencia',
                    'servicio.servicio as servicio_utilizado',
                    'servicio.id_clasificacion_servicio',
                    'unidad_de_medida.unidad_de_medida as unidad'

                )
                ->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $actionBtn = '<span style="cursor: pointer;" data-placement="left" title="Ver Servicio" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalDetalleServicio" data-backdrop="static" data-keyboard="false" onClick="VerServicioAsignado(' . $row->id_rel_industria_servicio . ')"><i class="mdi mdi-eye font-22 text-danger"></i></span>

                                                            <span style="cursor: pointer;" data-placement="left" title="Actualizar Servicio" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalCombustible" data-backdrop="static" data-keyboard="false" onClick="UpdateCombustibleAsignado(' . $row->id_rel_industria_servicio . ');"><i class="mdi mdi-table-edit font-22 text-danger"></i></span>

                                                            <span style="cursor: pointer;" title="Eliminar Insumo" onClick="EliminarServicioAsignado(' . $row->id_rel_industria_servicio . ')"><i class="mdi mdi-delete font-22 text-danger"></i></span>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function listRelotros(Request $request)
    {

        if ($request->ajax()) {
            $data = DB::table('rel_industria_servicio')
                ->join('servicio', 'rel_industria_servicio.id_servicio', '=', 'servicio.id_servicio')

                ->join('frecuencia_de_contratacion', 'rel_industria_servicio.id_frecuencia_de_contratacion', '=', 'frecuencia_de_contratacion.id_frecuencia_de_contratacion')
                ->where('id_industria', intval($request->id_industria)) //es el id_industira
                ->where('servicio.id_clasificacion_servicio', 3)
                ->orWhere('servicio.id_clasificacion_servicio', 4)
                ->where('anio',$request->p_f)
                ->select(
                    'rel_industria_servicio.*',
                    'frecuencia_de_contratacion.frecuencia_de_contratacion as frecuencia',
                    'servicio.servicio as servicio_utilizado',
                    'servicio.id_clasificacion_servicio',


                )
                ->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $actionBtn = '

                        <span style="cursor: pointer;" data-placement="left" title="Ver Servicio" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalDetalleServicio" data-backdrop="static" data-keyboard="false" onClick="VerServicioAsignado(' . $row->id_rel_industria_servicio . ')"><i class="mdi mdi-eye font-22 text-danger"></i></span>

                                                            <span style="cursor: pointer;" data-placement="left" title="Actualizar Servicio" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalOtros" data-backdrop="static" data-keyboard="false" onClick="UpdateOtrosAsignado(' . $row->id_rel_industria_servicio . ');"><i class="mdi mdi-table-edit font-22 text-danger"></i></span>

                                                            <span style="cursor: pointer;" title="Eliminar Insumo" onClick="EliminarServicioAsignado(' . $row->id_rel_industria_servicio . ')"><i class="mdi mdi-delete font-22 text-danger"></i></span>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    public function listRelbasico(Request $request)
    {

        if ($request->ajax()) {
            $data = DB::table('rel_industria_servicio')
                ->join('servicio', 'rel_industria_servicio.id_servicio', '=', 'servicio.id_servicio')

                ->join('frecuencia_de_contratacion', 'rel_industria_servicio.id_frecuencia_de_contratacion', '=', 'frecuencia_de_contratacion.id_frecuencia_de_contratacion')
                ->where('id_industria', intval($request->id_industria)) //es el id_industira
                ->where('servicio.id_clasificacion_servicio', 1)
                ->where('anio',$request->p_f)

                ->select(
                    'rel_industria_servicio.*',
                    'frecuencia_de_contratacion.frecuencia_de_contratacion as frecuencia',
                    'servicio.servicio as servicio_utilizado',
                    'servicio.id_clasificacion_servicio',


                )
                ->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $actionBtn = '

                    <span style="cursor: pointer;" data-placement="left" title="Ver Servicio" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalDetalleServicio" data-backdrop="static" data-keyboard="false" onClick="VerServicioAsignado(' . $row->id_rel_industria_servicio . ')"><i class="mdi mdi-eye font-22 text-danger"></i></span>

                    <span style="cursor: pointer;" data-placement="left" title="Actualizar Servicio" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalUpdateServicioBasico" data-backdrop="static" data-keyboard="false" onClick="UpdateServicioBasicoAsignado(' . $row->id_rel_industria_servicio . ')"><i class="mdi mdi-table-edit font-22 text-danger"></i></span>

                        ';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function listar_servicios_basicos(Request $request)
    {
        return response()->json(DB::table('servicio')->where('id_clasificacion_servicio', intval($request->id))->where('activo', 'S')->get());
    }

    public function search_servicio_otros(Request $request)
    {

        if ($request->search == '') {
            $servicio = DB::table('servicio')->orderby('servicio', 'asc')->select('id_servicio', 'servicio')->limit(5)->get();
        } else {
            $servicio = DB::table('servicio')->where("servicio", "LIKE", "%{$request->search}%")
                ->where('activo', 'S')
                ->where('id_clasificacion_servicio', 3)
                ->orWhere('id_clasificacion_servicio', 4)
                ->get();
        }


        $response = array();
        foreach ($servicio as $ser) {
            $response[] = array("value" => $ser->id_servicio, "label" => trim($ser->servicio));
        }

        return response()->json($response);
    }


}
