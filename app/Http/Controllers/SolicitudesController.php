<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;
use Carbon\Carbon;

class SolicitudesController extends Controller
{
   public function aprobarSolicitud(Request $request)
   {


      $params = [];
      parse_str($request->data, $params);


      try {
         
         
         if($params['status'] == "1"){

            //activo usuario
            DB::table('usuario')->where('id_usuario',intval($params['usr']))->update([
               'autorizado'=>'S',
               'activo'=>'S',
               'fecha_de_actualizacion'=>Carbon::now()
            ]); 

            DB::table('rel_persona_contribuyente')->where('id_rel_persona_contribuyente',intval($params['id_rel_persona_contribuyente']))->update([
               'autorizado'=>'S',
               'fecha_de_actualizacion'=>Carbon::now()
            ]); 
            DB::table('contribuyente')->where('id_contribuyente',intval($params['contribuyente']))->update([
               'activo'=>'S',
               'fecha_de_actualizacion'=>Carbon::now()
            ]); 

            //enviar mail


            return response()->json(array('status' =>200, 'msg' => 'Aprobado Correctamente'), 200);

         }else{


            //activo usuario
            DB::table('usuario')->where('id_usuario',intval($params['usr']))->update([
               'autorizado'=>'R',
               'activo'=>'N',
               'fecha_de_actualizacion'=>Carbon::now()
            ]); 

            DB::table('rel_persona_contribuyente')->where('id_rel_persona_contribuyente',intval($params['id_rel_persona_contribuyente']))->update([
               'autorizado'=>'R',
               'fecha_de_actualizacion'=>Carbon::now()
            ]); 
            DB::table('contribuyente')->where('id_contribuyente',intval($params['contribuyente']))->update([
               'activo'=>'N',
               'fecha_de_actualizacion'=>Carbon::now()
            ]); 

            //enviar mail

            return response()->json(array('status' =>200, 'msg' => 'Rechazado Correctamente, se le informará al contribuyente'), 200);
         }
      

      } catch (\Throwable $th) {
         return response()->json(array('status' =>400), 200);

      }
   }
}
