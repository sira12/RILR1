<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class SistemasCalidadController extends Controller
{
    public function getSc(Request $request)
    {

        $result = DB::table('sistema_de_calidad')->where('activo', 'S')->get();

        return response()->json($result);
    }

    public function saveSc(Request $request)
    {


        $params = [];

        parse_str($request->data, $params);


        $id_industria = intval($request->id_industria);


        $periodo_fiscal = $request->p_f;

        $status = 200;
        //comprobaciones



        foreach ($params['checkbox'] as $index => $cb) {


            $s_existente = [];
            $s_existente = DB::table('rel_industria_sistema')
                ->where('id_industria', $id_industria)
                ->where('id_sistema_de_calidad', intval($params['id_sistema_de_calidad'][$index]))
                ->where('anio', $periodo_fiscal)
                ->get();

            if (count($s_existente) > 0) {
                $nombre_cert = DB::table('sistema_de_calidad')
                    ->where('id_sistema_de_calidad', $s_existente[0]->id_sistema_de_calidad)
                    ->get();

                $msg = "¡La industria ya tiene cargado " . $nombre_cert[0]->sistema_de_calidad;
                $status = 1;

                break;
            }

            $fecha_inicio = null;
            $fecha_fin = null;

            $id_estado = 0;


            if ($cb == "POSEE") {
                $fecha_inicio = new Carbon($params['inicio_sistema'][$index]);
                $fecha_fin = new Carbon($params['fin_sistema'][$index]);
                $id_estado = 1;
            }

            if ($cb == "NO POSEE") {
                $id_estado = 2;
            }

            if ($cb == "EN TRAMITE") {
                $id_estado = 3;
            }

            if (DB::table('rel_industria_sistema')->insertGetId([
                'id_industria' => $id_industria,
                'id_sistema_de_calidad' => intval($params['id_sistema_de_calidad'][$index]),
                'id_estado_documentacion' => $id_estado,
                'fecha_fin' => $fecha_fin,
                'fecha_inicio' => $fecha_inicio,
                'anio' => $periodo_fiscal,
                'fecha_de_actualizacion' => Carbon::now(),
            ])) {
                $msg = "¡Datos Guardados exitosamente!";
            } else {
                $status = 1;
                $msg = "¡error!";
            }
        }

        return response()->json(array('status' => $status, 'msg' => $msg), 200);
    }

    public function lisRelSc(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('rel_industria_sistema')
                ->join('sistema_de_calidad', 'rel_industria_sistema.id_sistema_de_calidad', '=', 'sistema_de_calidad.id_sistema_de_calidad')
                ->join('estado_documentacion', 'rel_industria_sistema.id_estado_documentacion', '=', 'estado_documentacion.id_estado_documentacion')
                ->where('id_industria', intval($request->id_industria)) //es el id_industira
                ->where('anio',$request->p_f)
                ->select(
                    'rel_industria_sistema.*',
                    'sistema_de_calidad.sistema_de_calidad',
                    "estado_documentacion.estado"
                )
                ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    /* 

                    <span style="cursor: pointer;" data-placement="left" title="Ver Sistema" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalDetalleSistema" data-backdrop="static" data-keyboard="false" onClick="VerSistema('')"><i class="mdi mdi-eye font-22 text-danger"></i></span>

                    */
                    $actionBtn = '<span style="cursor: pointer;" data-placement="left" title="Actualizar Sistema" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalUpdateSistema" data-backdrop="static" data-keyboard="false" onClick="UpdateSistema(' . $row->id_rel_industria_sistema . ');"><i class="mdi mdi-table-edit font-22 text-danger"></i></span>

                    <span style="cursor: pointer;" title="Eliminar Sistema" onClick="EliminarSistema(' . $row->id_rel_industria_sistema . ')"><i class="mdi mdi-delete font-22 text-danger"></i></span>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function getRelSc(Request $request)
    {

        $data = DB::table('rel_industria_sistema')
            ->join('sistema_de_calidad', 'rel_industria_sistema.id_sistema_de_calidad', '=', 'sistema_de_calidad.id_sistema_de_calidad')
            ->join('estado_documentacion', 'rel_industria_sistema.id_estado_documentacion', '=', 'estado_documentacion.id_estado_documentacion')
            ->where('id_rel_industria_sistema', intval($request->id)) //es el id_industira
            ->select(
                'rel_industria_sistema.*',
                'sistema_de_calidad.sistema_de_calidad',
                "estado_documentacion.estado"
            )
            ->get();

        return response()->json($data);
    }

    public function updateSc(Request $request)
    {

        $periodo_fiscal= $request->p_f;
        $params = [];
        parse_str($request->data, $params);
        $status = 200;

        $fecha_inicio = null;
        $fecha_fin = null;


        $id_estado = 0;

        if ($params['estado_sistema'] == "POSEE") {

            $fecha_inicio = new Carbon($params['inicio_sistema']);
            $fecha_fin = new Carbon($params['fin_sistema']);
            $id_estado = 1;
        }

        if ($params['estado_sistema'] == "NO POSEE") {
            $id_estado = 2;
        }

        if ($params['estado_sistema'] == "EN TRAMITE") {
            $id_estado = 3;
        }

        if (DB::table('rel_industria_sistema')->where('id_rel_industria_sistema', intval($params['id_rel_industria_sistema']))->update([

            'id_estado_documentacion' => $id_estado,
            'fecha_fin' => $fecha_fin,
            'fecha_inicio' => $fecha_inicio,
            'fecha_de_actualizacion' => Carbon::now(),
        ])) {
            $msg = "¡Datos Guardados exitosamente!";
        } else {
            $status = 1;
            $msg = "¡error!";
        }

        return response()->json(array('status' => $status, 'msg' => $msg), 200);
    }

    public function deleteRelSc(Request $request)
    {
        if (DB::table('rel_industria_sistema')->where('id_rel_industria_sistema', intval($request->id))->delete()) {
            return response()->json(array('status' => 200), 200);
        }
    }


    public function getPromo(Request $request)
    {

        $result = DB::table('promocion_industrial')->where('activo', 'S')->get();

        return response()->json($result);
    }

    public function savePromo(Request $request)
    {


        $params = [];

        parse_str($request->data, $params);


        $id_industria = intval($request->id_industria);

        $date = Carbon::now()->format('Y');
        $periodo_fiscal= $request->p_f;
	  
        $status = 200;
        //comprobaciones


        foreach ($params['checkbox'] as $index => $cb) {


            $s_existente = [];
            $s_existente = DB::table('rel_industria_promocion_industrial')
                ->where('id_industria', $id_industria)
                ->where('id_promocion_industrial', intval($params['id_promocion_industrial'][$index]))
                ->where('anio',$periodo_fiscal)
                ->get();

            if (count($s_existente) > 0) {
                $nombre_cert = DB::table('promocion_industrial')
                    ->where('id_promocion_industrial', $s_existente[0]->id_promocion_industrial)
                    ->get();

                $msg = "¡La industria ya tiene cargado " . $nombre_cert[0]->promocion_industrial;
                $status = 1;

                break;
            }

            $fecha_inicio = null;
            $fecha_fin = null;

            $id_estado = 0;


            if ($cb == "POSEE") {
                $fecha_inicio = new Carbon($params['inicio_promocion'][$index]);
                $fecha_fin = new Carbon($params['fin_promocion'][$index]);
                $id_estado = 1;
            }

            if ($cb == "NO POSEE") {
                $id_estado = 2;
            }

            if ($cb == "EN TRAMITE") {
                $id_estado = 3;
            }

            if (DB::table('rel_industria_promocion_industrial')->insertGetId([
                'id_industria' => $id_industria,
                'id_promocion_industrial' => intval($params['id_promocion_industrial'][$index]),
                'id_estado_documentacion' => $id_estado,
                'fecha_fin' => $fecha_fin,
                'fecha_inicio' => $fecha_inicio,
                'anio' => $periodo_fiscal,
                'fecha_de_actualizacion' => Carbon::now(),
            ])) {
                $msg = "¡Datos Guardados exitosamente!";
            } else {
                $status = 1;
                $msg = "¡error!";
            }
        }

        return response()->json(array('status' => $status, 'msg' => $msg), 200);
    }

    public function lisRelPromo(Request $request)
    {

        if ($request->ajax()) {
            $data = DB::table('rel_industria_promocion_industrial')
                ->join('promocion_industrial', 'rel_industria_promocion_industrial.id_promocion_industrial', '=', 'promocion_industrial.id_promocion_industrial')
                ->join('estado_documentacion', 'rel_industria_promocion_industrial.id_estado_documentacion', '=', 'estado_documentacion.id_estado_documentacion')
                ->where('id_industria', intval($request->id_industria)) //es el id_industira
                ->where('anio',$request->p_f)
                ->select(
                    'rel_industria_promocion_industrial.*',
                    'promocion_industrial.promocion_industrial',
                    "estado_documentacion.estado"
                )
                ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    /* 

                   <span style="cursor: pointer;" data-placement="left" title="Ver Promoción" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalDetallePromocion" data-backdrop="static" data-keyboard="false" onClick="VerPromocion('')"><i class="mdi mdi-eye font-22 text-danger"></i></span>

                    */
                    $actionBtn = '
                    <span style="cursor: pointer;" data-placement="left" title="Actualizar Promoción" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalUpdatePromocion" data-backdrop="static" data-keyboard="false" onClick="UpdatePromocion(' . $row->id_rel_industria_promocion_industrial . ');"><i class="mdi mdi-table-edit font-22 text-danger"></i></span>
                    <span style="cursor: pointer;" title="Eliminar Promoción" onClick="EliminarPromocion(' . $row->id_rel_industria_promocion_industrial . ')"><i class="mdi mdi-delete font-22 text-danger"></i></span>
                   ';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }


    public function getRelPromo(Request $request)
    {


        $data = DB::table('rel_industria_promocion_industrial')
            ->join('promocion_industrial', 'rel_industria_promocion_industrial.id_promocion_industrial', '=', 'promocion_industrial.id_promocion_industrial')
            ->join('estado_documentacion', 'rel_industria_promocion_industrial.id_estado_documentacion', '=', 'estado_documentacion.id_estado_documentacion')
            ->where('id_rel_industria_promocion_industrial', intval($request->id)) //es el id_industira
            ->select(
                'rel_industria_promocion_industrial.*',
                'promocion_industrial.promocion_industrial',
                "estado_documentacion.estado"
            )
            ->get();


        return response()->json($data);
    }

    public function updateRelPromo(Request $request)
    {


        $params = [];
        parse_str($request->data, $params);
        $status = 200;

        $fecha_inicio = null;
        $fecha_fin = null;

        $periodo_fiscal= $request->p_f;
        $id_estado = 0;

        if ($params['estado_promocion'] == "POSEE") {

            $fecha_inicio = new Carbon($params['inicio_promocion']);
            $fecha_fin = new Carbon($params['fin_promocion']);
            $id_estado = 1;
        }

        if ($params['estado_promocion'] == "NO POSEE") {
            $id_estado = 2;
        }

        if ($params['estado_promocion'] == "EN TRAMITE") {
            $id_estado = 3;
        }

        if (DB::table('rel_industria_promocion_industrial')->where('id_rel_industria_promocion_industrial', intval($params['id_rel_industria_promocion_industrial']))->update([

            'id_estado_documentacion' => $id_estado,
            'fecha_fin' => $fecha_fin,
            'fecha_inicio' => $fecha_inicio,
            'fecha_de_actualizacion' => Carbon::now(),
        ])) {
            $msg = "¡Datos Guardados exitosamente!";
        } else {
            $status = 1;
            $msg = "¡error!";
        }

        return response()->json(array('status' => $status, 'msg' => $msg), 200);
    }


    public function deleteRelPromo(Request $request)
    {
        if (DB::table('rel_industria_promocion_industrial')->where('id_rel_industria_promocion_industrial', intval($request->id))->delete()) {
            return response()->json(array('status' => 200), 200);
        }
    }
}
