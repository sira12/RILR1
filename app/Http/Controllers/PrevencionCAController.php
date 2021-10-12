<?php

namespace App\Http\Controllers;

use App\Models\Efluente;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class PrevencionCAController extends Controller
{

    public function search_efluente(Request $request)
    {
        if ($request->search == '') {
            $insumos = DB::table('efluente')->orderby('efluente', 'asc')->select('id_efluente', 'efluente')->limit(5)->get();
        } else {
            $efluentes = DB::table('efluente')->where("efluente", "LIKE", "%{$request->search}%")
                ->where('activo', 'S')
                ->get();
        }


        $response = array();
        foreach ($efluentes as $efluente) {
            $response[] = array("value" => $efluente->id_efluente, "label" => trim($efluente->efluente));
        }

        return response()->json($response);
    }

    public function store_efluente(Request $request)
    {
        $params = [];
        parse_str($request->data, $params);

        //comprobar si el efluente existe; si existe se devuelve id del efluente
        $result = DB::table('efluente')->where('efluente', $params['search_efluente_e'])->get();

        if (count($result) >= 1) {
            //devulvo id
            $response = $result[0]['id_efluente'];
        } else {
            //si no existe guardarlo
            $efluente = new Efluente();

            $efluente->efluente = $params['search_efluente_e'];
            $efluente->activo = "S";

            $efluente->save();
            //devuelvo id
            $response = $efluente->id_efluente;
        }

        return $response;
    }

    public function saveRelEfluente(Request $request)
    {
        $params = [];

        parse_str($request->data, $params);

        $id_industria = intval($request->id_industria);
        $status = 200;
        $periodo_fiscal = $request->p_f;

        //si el id del insumo viene vacio significa que no encontró el insumo, por lo tanto hay que cargarlo
        if ($params['id_efluente_e'] == "") {
            $efluente = new PrevencionCAController();
            $id_efluente = $efluente->store_efluente($request);
        } else {
            $id_efluente = intval($params['id_efluente_e']);
        }

        //comprobaciones
        $ef_existente = DB::table('rel_industria_efluente')
            ->where('id_industria', $id_industria)
            ->where('id_efluente',  $id_efluente)
            ->where('anio', $periodo_fiscal)
            ->get();


        //si el ef ya esta cargado para esta industria devolver msj
        if (count($ef_existente) > 0) {
            $msg = "¡Este efluente ya se encuentra cargado para esta industria!";
            $status = 1;
        } else {

            if (DB::table('rel_industria_efluente')->insertGetId([
                'id_industria' => $id_industria,
                'id_efluente' => $id_efluente,
                'tratamiento' => $params['tratamiento_residuo'],
                'destino' => $params['destino'],
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

    public function getEfluente(Request $request)
    {

        $result = DB::table('rel_industria_efluente')
            ->join('efluente', 'rel_industria_efluente.id_efluente', '=', 'efluente.id_efluente')
            ->where('id_rel_industria_efluente', intval($request->id))
            ->select(
                'rel_industria_efluente.*',
                'efluente.efluente',


            )
            ->get();

        return response()->json($result);
    }

    public function updateRelEfluenteIndustria(Request $request)
    {
        $params = [];
        parse_str($request->data, $params);
        $id_industria = intval($request->id_industria);
        $status = 200;
        $periodo_fiscal= $request->p_f;
	  

        //si el id del insumo viene vacio significa que no encontró el insumo, por lo tanto hay que cargarlo
        if ($params['id_efluente_e'] == "") {
            $efluente = new PrevencionCAController();
            $id_efluente = $efluente->store_efluente($request);
        } else {
            $id_efluente = intval($params['id_efluente_e']);
        }

        //comprobaciones
        $ef_existente = DB::table('rel_industria_efluente')
            ->where('id_industria', $id_industria)
            ->where('id_rel_industria_efluente', '!=', intval($params['id_rel_industria_efluente']))
            ->where('id_efluente',  $id_efluente)
            ->where('anio',$periodo_fiscal)
            ->get();


        //si el ef ya esta cargado para esta industria devolver msj
        if (count($ef_existente) > 0) {
            $msg = "¡Este efluente ya se encuentra cargado para esta industria!";
            $status = 1;
        } else {

            if (DB::table('rel_industria_efluente')->where('id_rel_industria_efluente', intval($params['id_rel_industria_efluente']))
                ->update([
                    'id_industria' => $id_industria,
                    'id_efluente' => $id_efluente,
                    'tratamiento' => $params['tratamiento_residuo'],
                    'destino' => $params['destino'],
                    'fecha_de_actualizacion' => Carbon::now(),
                ])
            ) {

                $msg = "¡Datos Guardados exitosamente!";
            } else {
                $status = 1;
                $msg = "¡error!";
            }
        }

        return response()->json(array('status' => $status, 'msg' => $msg), 200);
    }



    public function deleteRelEfluente(Request $request)
    {
        if (DB::table('rel_industria_efluente')->where('id_rel_industria_efluente', intval($request->id))->delete()) {
            return response()->json(array('status' => 200), 200);
        }
    }



    public function listef(Request $request)
    {

        if ($request->ajax()) {
            $data = DB::table('rel_industria_efluente')
                ->join('efluente', 'rel_industria_efluente.id_efluente', '=', 'efluente.id_efluente')
                ->where('id_industria', intval($request->id_industria)) //es el id_industira
                ->where('anio',$request->p_f)
                ->select(
                    'rel_industria_efluente.*',
                    'efluente.efluente',


                )
                ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    // <span style="cursor: pointer;" data-placement="left" title="Ver Efluente" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalDetalleEfluente" data-backdrop="static" data-keyboard="false" onClick="VerEfluente(' . $row->id_rel_industria_efluente . ')"><i class="mdi mdi-eye font-22 text-danger"></i></span>

                    $actionBtn = '

                    <span style="cursor: pointer;" data-placement="left" title="Actualizar Efluente" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalEfluente" data-backdrop="static" data-keyboard="false" onClick="UpdateEfluente(' . $row->id_rel_industria_efluente . ')"><i class="mdi mdi-table-edit font-22 text-danger"></i></span>

                    <span style="cursor: pointer;" title="Eliminar Efluente" onClick="EliminarEfluente(' . $row->id_rel_industria_efluente . ')"><i class="mdi mdi-delete font-22 text-danger"></i></span>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }


    public function getCertificados()
    {

        $r = DB::table('certificado')->where('activo', 'S')->get();

        return response()->json($r);
    }

    public function saveRelCert(Request $request)
    {
        $params = [];

        parse_str($request->data, $params);


        $id_industria = intval($request->id_industria);
        $status = 200;
        $periodo_fiscal= $request->p_f;
	   
        //comprobaciones
        foreach ($params['checkbox'] as $index => $cb) {


            $cer_existente = [];
            $cer_existente = DB::table('rel_industria_certificado')
                ->where('id_industria', $id_industria)
                ->where('id_certificado', intval($params['id_certificado'][$index]))
                ->where('anio',$periodo_fiscal)
                ->get();

            if (count($cer_existente) > 0) {
                $nombre_cert = DB::table('certificado')
                    ->where('id_certificado', $cer_existente[0]->id_certificado)
                    ->get();

                $msg = "¡La industria ya tiene cargado " . $nombre_cert[0]->certificado;
                $status = 1;

                break;
            }

            $fecha_inicio = null;
            $fecha_fin = null;

            $id_estado = 0;


            if ($cb == "POSEE") {
                $id_estado = 1;
                $fecha_inicio = new Carbon($params['inicio_certificado'][$index]);
                $fecha_fin = new Carbon($params['fin_certificado'][$index]);
            }

            if ($cb == "NO POSEE") {
                $id_estado = 2;
            }

            if ($cb == "EN TRAMITE") {
                $id_estado = 3;
            }


            if (DB::table('rel_industria_certificado')->insertGetId([
                'id_industria' => $id_industria,
                'id_certificado' => intval($params['id_certificado'][$index]),
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


    public function lisRelCert(Request $request)
    {

        if ($request->ajax()) {
            $data = DB::table('rel_industria_certificado')
                ->join('certificado', 'rel_industria_certificado.id_certificado', '=', 'certificado.id_certificado')
                ->join('estado_documentacion', 'rel_industria_certificado.id_estado_documentacion', '=', 'estado_documentacion.id_estado_documentacion')
                ->where('id_industria', intval($request->id_industria)) //es el id_industira
                ->where('anio',$request->p_f)
                ->select(
                    'rel_industria_certificado.*',
                    'certificado.certificado',
                    "estado_documentacion.estado"

                )
                ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    //<span style="cursor: pointer;" data-placement="left" title="Ver Certificado" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalDetalleCertificado" data-backdrop="static" data-keyboard="false" onClick="VerCertificado(' . $row->id_rel_industria_certificado . ')"><i class="mdi mdi-eye font-22 text-danger"></i></span>

                    $actionBtn = '

                    <span style="cursor: pointer;" data-placement="left" title="Actualizar Certificado" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalUpdateCertificado" data-backdrop="static" data-keyboard="false" onClick="UpdateCertificado(' . $row->id_rel_industria_certificado . ');"><i class="mdi mdi-table-edit font-22 text-danger"></i></span>

                    <span style="cursor: pointer;" title="Eliminar Certificado" onClick="EliminarCertificado(' . $row->id_rel_industria_certificado . ')"><i class="mdi mdi-delete font-22 text-danger"></i></span>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }


    public function getRelcert(Request $request)
    {


        $result = DB::table('rel_industria_certificado')
            ->join('certificado', 'rel_industria_certificado.id_certificado', '=', 'certificado.id_certificado')
            ->join('estado_documentacion', 'rel_industria_certificado.id_estado_documentacion', '=', 'estado_documentacion.id_estado_documentacion')
            ->select(
                'rel_industria_certificado.*',
                'certificado.certificado',
                "estado_documentacion.estado"
            )
            ->where('id_rel_industria_certificado', intval($request->id))
            ->get();

        return response()->json($result);
    }

    public function updateRelCert(Request $request)
    {

        $params = [];
        parse_str($request->data, $params);
        $status = 200;

        $fecha_inicio = null;
        $fecha_fin = null;

        $id_estado = 0;

        if ($params['estado_certificado'] == "POSEE") {

            $fecha_inicio = new Carbon($params['inicio_certificado']);
            $fecha_fin = new Carbon($params['fin_certificado']);
            $id_estado = 1;
        }


        if ($params['estado_certificado'] == "NO POSEE") {
            $id_estado = 2;
        }

        if ($params['estado_certificado'] == "EN TRAMITE") {
            $id_estado = 3;
        }

        if (DB::table('rel_industria_certificado')->where('id_rel_industria_certificado', intval($params['id_rel_industria_certificado']))->update([

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


    public function deleteRelCert(Request $request)
    {
        if (DB::table('rel_industria_certificado')->where('id_rel_industria_certificado', intval($request->id))->delete()) {
            return response()->json(array('status' => 200), 200);
        }
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
