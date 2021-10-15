<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class EconomiaController extends Controller
{
    
    //trae sectores
    public function getSP(Request $request){
        $sectores=DB::table('economia_del_conocimiento_sector')
        ->where('activo',"S")
        ->where('id_economia_del_conocimiento_clasificacion',1)
        ->get();

        return response()->json($sectores); 
    }

    public function saveEc(Request $request){

        $params = [];
        parse_str($request->data, $params);
        $id_industria = intval($request->id_industria);

        $date = Carbon::now()->format('Y');
        $status = 200;
        $periodo_fiscal= $request->p_f;

        if(isset($params['sectores'])){

            foreach($params['sectores'] as $sector){

                //comprobaciones
                $s_existente=[];
                $s_existente = DB::table('rel_industria_economia_del_conocimiento_sector')
                ->where('id_industria', $id_industria)
                ->where('id_economia_del_conocimiento_sector', intval($sector))
                ->where('anio',$periodo_fiscal)
                ->get();

                if (count($s_existente) > 0) {
                    $nombre_cert= DB::table('economia_del_conocimiento_sector')
                    ->where('id_economia_del_conocimiento_sector', $s_existente[0]->id_economia_del_conocimiento_sector)
                    ->get();
                  
                    $msg = "¡La industria ya tiene cargado ".$nombre_cert[0]->sector;
                    $status = 1;

                    break;    
                }


                if (DB::table('rel_industria_economia_del_conocimiento_sector')->insertGetId([
                    'id_industria' => $id_industria,
                    'id_economia_del_conocimiento_sector' => intval($sector),
                    'anio' => $periodo_fiscal,
                    'fecha_de_actualizacion' => Carbon::now(),
                ])) {
                    $msg = "¡Datos Guardados exitosamente!";
                } else {
                    $status = 1;
                    $msg = "¡error!";
                }
            }

        }else if($params['otro_sector'] != ""){

            $id=DB::table('economia_del_conocimiento_sector')->insertGetId([
                'sector' => $params['otro_sector'],
                'id_economia_del_conocimiento_clasificacion' => 2,
                'activo' => "S",
                
            ]); 


            if (DB::table('rel_industria_economia_del_conocimiento_sector')->insertGetId([
                'id_industria' => $id_industria,
                'id_economia_del_conocimiento_sector' => $id,
                'anio' => $date,
                'fecha_de_actualizacion' => Carbon::now(),
            ])) {
                $msg = "¡Datos Guardados exitosamente!";
            } else {
                $status = 1;
                $msg = "¡error!";
            }
        }

        if(!isset($params['sectores']) && $params['otro_sector'] == "" ){
            $status = 1;
            $msg = "Debes seleccionar al menos 1 sector!";
        }

        return response()->json(array('status' => $status, 'msg' => $msg), 200);


    }


    public function lisReleco(Request $request){
        if ($request->ajax()) {
            $data = DB::table('rel_industria_economia_del_conocimiento_sector')
                ->join('economia_del_conocimiento_sector', 'rel_industria_economia_del_conocimiento_sector.id_economia_del_conocimiento_sector', '=', 'economia_del_conocimiento_sector.id_economia_del_conocimiento_sector')
                ->where('id_industria', intval($request->id_industria)) //es el id_industira
                ->where('anio',$request->p_f)
                ->select(
                    'rel_industria_economia_del_conocimiento_sector.*',
                    'economia_del_conocimiento_sector.sector',
                   
                )
                ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                   /* 

                    <span style="cursor: pointer;" data-placement="left" title="Ver Sistema" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalDetalleSistema" data-backdrop="static" data-keyboard="false" onClick="VerSistema('')"><i class="mdi mdi-eye font-22 text-danger"></i></span>

                    */
                    $actionBtn = '<span style="cursor: pointer;" title="Eliminar Economia" onClick="EliminarEconomia('.$row->id_rel_economia_del_conocimiento_sector.')"><i class="mdi mdi-delete font-22 text-danger"></i></span>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function deleteRelEconomia(Request $request){
        if(DB::table('rel_economia_del_conocimiento_sector')->where('id_rel_economia_del_conocimiento_sector', intval($request->id))->delete()){
            return response()->json(array('status' => 200), 200);
        }
    }


    public function getPerfil(Request $request){

        $perfiles=DB::table('economia_del_conocimiento_perfil')
        ->where('activo',"S")
        ->where('id_economia_del_conocimiento_clasificacion',1)
        ->get();

        return response()->json($perfiles); 

    }


    public function savePerfil(Request $request){

        $params = [];
        parse_str($request->data, $params);
        $id_industria = intval($request->id_industria);

        $date = Carbon::now()->format('Y');
        $status = 200;
        $periodo_fiscal= $request->p_f;

        if(isset($params['perfiles'])){

            foreach($params['perfiles'] as $perfil){

                //comprobaciones
                $s_existente=[];
                $s_existente = DB::table('rel_industria_economia_del_conocimiento_perfil')
                ->where('id_industria', $id_industria)
                ->where('id_economia_del_conocimiento_perfil', intval($perfil))
                ->where('anio', $periodo_fiscal)
                ->get();

                if (count($s_existente) > 0) {
                    $nombre_cert= DB::table('economia_del_conocimiento_perfil')
                    ->where('id_economia_del_conocimiento_perfil', $s_existente[0]->id_economia_del_conocimiento_perfil)
                    ->get();
                  
                    $msg = "¡La industria ya tiene cargado ".$nombre_cert[0]->perfil;
                    $status = 1;

                    break;    
                }


                if (DB::table('rel_industria_economia_del_conocimiento_perfil')->insertGetId([
                    'id_industria' => $id_industria,
                    'id_economia_del_conocimiento_perfil' => intval($perfil),
                    'anio' => $periodo_fiscal,
                    'fecha_de_actualizacion' => Carbon::now(),
                ])) {
                    $msg = "¡Datos Guardados exitosamente!";
                } else {
                    $status = 1;
                    $msg = "¡error!";
                }
            }

        }else if($params['otro_perfil'] != ""){

            $id=DB::table('economia_del_conocimiento_perfil')->insertGetId([
                'perfil' => $params['otro_perfil'],
                'id_economia_del_conocimiento_clasificacion' => 2,
                'activo' => "S",
                
            ]); 


            if (DB::table('rel_industria_economia_del_conocimiento_perfil')->insertGetId([
                'id_industria' => $id_industria,
                'id_economia_del_conocimiento_perfil' => $id,
                'anio' => $periodo_fiscal,
                'fecha_de_actualizacion' => Carbon::now(),
            ])) {
                $msg = "¡Datos Guardados exitosamente!";
            } else {
                $status = 1;
                $msg = "¡error!";
            }
        }

        if(!isset($params['perfiles']) && $params['otro_perfil'] == "" ){
            $status = 1;
            $msg = "Debes seleccionar al menos 1 sector!";
        }

        return response()->json(array('status' => $status, 'msg' => $msg), 200);


    }



    public function lisRelPerfil(Request $request){
        if ($request->ajax()) {
            $data = DB::table('rel_industria_economia_del_conocimiento_perfil')
                ->join('economia_del_conocimiento_perfil', 'rel_industria_economia_del_conocimiento_perfil.id_economia_del_conocimiento_perfil', '=', 'economia_del_conocimiento_perfil.id_economia_del_conocimiento_perfil')
                ->where('id_industria', intval($request->id_industria)) //es el id_industira
                ->where('anio',$request->p_f)
                ->select(
                    'rel_industria_economia_del_conocimiento_perfil.*',
                    'economia_del_conocimiento_perfil.perfil',
                   
                )
                ->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                   /* 

                    <span style="cursor: pointer;" data-placement="left" title="Ver Sistema" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalDetalleSistema" data-backdrop="static" data-keyboard="false" onClick="VerSistema('')"><i class="mdi mdi-eye font-22 text-danger"></i></span>

                    */
                    $actionBtn = '<span style="cursor: pointer;" title="Eliminar Economia" onClick="EliminarPerfil('.$row->id_rel_economia_del_conocimiento_perfil.')"><i class="mdi mdi-delete font-22 text-danger"></i></span>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }


    public function deleteRelPerfil(Request $request) {
    
        if(DB::table('rel_industria_economia_del_conocimiento_perfil')->where('id_rel_economia_del_conocimiento_perfil', intval($request->id))->delete()){
            return response()->json(array('status' => 200), 200);
        }
    }
    
}


