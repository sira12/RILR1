<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class DdjjCOntroller extends Controller
{
    public function getViewsddjj(Request $request)
    {

        $id=$request->id;
        $result=[];
        $result['industria_contribuyente'] = DB::select("select * from vw_info_contribuyente_industria where id_industria =".$id);
        $result['servicios'] = DB::select("select * from vw_info_servicio where id_industria =".$id);
        $result['insumos'] = DB::select("select * from vw_info_insumo where id_industria =".$id);
        $result['certificados'] = DB::select("select * from vw_info_certificado where id_industria =".$id);
        $result['sistemas'] = DB::select('select * from vw_info_sistema_de_calidad where id_industria ='.$id);
        $result['act_prod'] = DB::select('select * from vw_info_actividad_producto where id_industria ='.$id);
        $result['act_mat'] = DB::select('select * from vw_info_actividad_materia_prima where id_industria ='.$id);
        $result['sit'] = DB::select('select * from vw_info_situacion_de_planta where id_industria ='.$id);
        $result['ocios'] = DB::select('select * from vw_info_motivo_ociosidad where id_industria ='.$id);
        $result['po'] = DB::select('select * from vw_info_industria_personal_ocupado where id_industria ='.$id);
        $result['venta_nacional'] = DB::select('select * from vw_info_ventas_nacionales where id_industria ='.$id);
        $result['venta_inter'] = DB::select('select * from vw_info_ventas_exterior where id_industria ='.$id);
        $result['fact'] = DB::select('select * from vw_info_facturacion where id_industria ='.$id);
        $result['efluente'] = DB::select('select * from vw_info_efluente where id_industria ='.$id);
        $result['gastos'] = DB::select('select * from vw_info_egreso where id_industria ='.$id);
        $result['promo'] = DB::select('select * from vw_info_promocion_industrial where id_industria ='.$id);
        $result['eco'] = DB::select('select * from vw_info_economia_del_conocimiento_sector where id_industria ='.$id);
        $result['perfil'] = DB::select('select * from vw_info_economia_del_conocimiento_perfil where id_industria ='.$id);
      

        if(count ($result['industria_contribuyente']) < 1){

            $result['content']=array( 'msg' => 'not_found');

            return response()->json($result, 200);
        }
        if(count ($result['servicios']) < 1){
           $result['content']=array( 'msg' => 'not_found');

            return response()->json($result, 200);
        }
        if(count ($result['insumos']) < 1){
           $result['content']=array( 'msg' => 'not_found');

            return response()->json($result, 200);
        }
        if(count ($result['certificados']) < 1){
           $result['content']=array( 'msg' => 'not_found');

            return response()->json($result, 200);
        }
        if(count ($result['sistemas']) < 1){
           $result['content']=array( 'msg' => 'not_found');

            return response()->json($result, 200);
        }
        if(count ($result['act_prod']) < 1){
           $result['content']=array( 'msg' => 'not_found');

            return response()->json($result, 200);
        }
        if(count ($result['act_mat']) < 1){
           $result['content']=array( 'msg' => 'not_found');

            return response()->json($result, 200);
        }
        if(count ($result['sit']) < 1){
           $result['content']=array( 'msg' => 'not_found');

            return response()->json($result, 200);
        }
        if(count ($result['ocios']) < 1){
           $result['content']=array( 'msg' => 'not_found');

            return response()->json($result, 200);
        }
        if(count ($result['po']) < 1){
           $result['content']=array( 'msg' => 'not_found');

            return response()->json($result, 200);
        }
        if(count ($result['venta_nacional']) < 1){
           $result['content']=array( 'msg' => 'not_found');

            return response()->json($result, 200);
        }
        if(count ($result['venta_inter']) < 1){
           $result['content']=array( 'msg' => 'not_found');

            return response()->json($result, 200);
        }
        if(count ($result['fact']) < 1){
           $result['content']=array( 'msg' => 'not_found');

            return response()->json($result, 200);
        }
        if(count ($result['efluente']) < 1){
           $result['content']=array( 'msg' => 'not_found');

            return response()->json($result, 200);
        }
        if(count ($result['gastos']) < 1){
           $result['content']=array( 'msg' => 'not_found');

            return response()->json($result, 200);
        }
        if(count ($result['promo']) < 1){
           $result['content']=array( 'msg' => 'not_found');

            return response()->json($result, 200);
        }
        if(count ($result['eco']) < 1){
           $result['content']=array( 'msg' => 'not_found');

            return response()->json($result, 200);
        }
        if(count ($result['perfil']) < 1){
           $result['content']=array( 'msg' => 'not_found');

            return response()->json($result, 200);
        }

        $result['content']=array( 'msg' => 'found');
        $fecha=Carbon::now();
        $fecha=str_replace(" ","_",$fecha);
        $fecha=str_replace(":","_",$fecha);
        $result['nombre_pdf']=$result['industria_contribuyente'][0]->cuit.'_'.$fecha;
        
        $pdf =PDF::loadView('Dj.dj',$result);
            
       
        $content = $pdf->download()->getOriginalContent();
        Storage::put('dj_docs/'.$result['industria_contribuyente'][0]->cuit.'/'.$result['industria_contribuyente'][0]->cuit.'_'.$fecha.'.pdf',$content);

        return response()->json($result);
    }
    
    public function download($name,$cuit){
        $pat_1='app\public\dj_docs';
        $path= storage_path($pat_1.'\\'.$cuit.'\\'.$name.'.pdf');
        
       
        return response()->download($path);
    }
}
