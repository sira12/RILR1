<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

use App\Models\Insumo;
class InsumoController extends Controller
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

    public function store_insumo (Request $request) {
      $params=[];
      parse_str($request->data,$params);

     //comprobar si el insumo existe; si existe se devuelve id del insumo
     $result=Insumo::where('insumo',$params['search_insumo'])->get();

     if(count($result) >= 1){
         //devulvo id
         $response=$result[0]['id_insumo'];
     }else{
         //si no existe guardarlo
         $insumo= new Insumo();

         $insumo->insumo=$params['search_insumo'];
         $insumo->activo="S";

         $insumo->save();
         //devuelvo id
         $response=$insumo->id_insumo;
     }

     return $response;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //guardar relacion insumo-industria
       $params=[];

       parse_str($request->data,$params);


       $id_industria= intval($request->id_industria);

       $date = Carbon::now()->format('Y');
       $status = 200;

       //si el id del insumo viene vacio significa que no encontró el insumo, por lo tanto hay que cargarlo
       if ($params['id_insumo'] == "") {
           $insumo = new InsumoController();
           $id_insumo = $insumo->store_insumo($request);
       } else {
           $id_insumo = intval($params['id_insumo']);
       }

       //comprobaciones
       $ins_existente = DB::table('rel_industria_insumo')
           ->where('id_industria', $id_industria)
           ->where('id_insumo',  $id_insumo)
           ->get();

        //si el insumo ya esta cargado para esta industria devolver msj
       if (count($ins_existente) > 0) {
           $msg = "¡Este insumo ya se encuentra cargado para esta industria!";
           $status = 1;
       } else {


         if ($params['es_propio_insumo'] == "P") {
            //si es propio significa que que no viene pais ni localidad, por lo tanto por defecto va el de la industria.
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
             $detalles = "";
         } else {
             $pais = intval($params['id_pais_insumo']);
             $localidad = intval($params['id_localidad_insumo']);
             $motivo = intval($params['motivo_importacion_insumo']);
             $detalles = isset($params['detalles_insumo']) ?  $params['detalles_insumo'] : "";
         }

         $id_rel_insumo_industria = DB::table('rel_industria_insumo')->insertGetId([
             'id_industria' => $id_industria,
             'id_insumo' => $id_insumo,
             'id_unidad_de_medida' => intval($params['medida_insumo']),
             'cantidad' => intval($params['cantidad_insumo']),
             'es_propio' => $params['es_propio_insumo'],
             'id_localidad' =>  $localidad ,
             'id_pais' => $pais,
             'id_motivo_importacion' => $motivo,
             'detalles' => $detalles,
             'anio' => $date,
             'fecha_de_actualizacion' => Carbon::now(),
         ]);

         $msg = "¡Datos Guardados exitosamente!";

       }

       return response()->json(array('status' => $status, 'msg' => $msg), 200);

    }

    public function getInsumo (Request $request) {

        $insumo=DB::table('rel_industria_insumo')->where('id_rel_industria_insumo',$request->id_rel_insumo)
        ->join('insumo', 'rel_industria_insumo.id_insumo','insumo.id_insumo')
        ->join('pais','rel_industria_insumo.id_pais','pais.id_pais')
        ->join('localidad','rel_industria_insumo.id_localidad','localidad.id_localidad')
        ->join('provincia','localidad.id_provincia','provincia.id_provincia')
        ->select(
          'rel_industria_insumo.*',
          'insumo.insumo',
          'pais.pais',
          'localidad.localidad',
          'provincia.provincia',
          'provincia.id_provincia'


        )
        ->get();

        return response()->json($insumo);





    }

    public function updateRelInsumo (Request $request) {
      $params=[];

      parse_str($request->data,$params);

      $id_industria= intval($request->id_industria);

      $date = Carbon::now()->format('Y');
      $status = 200;

      //si el id del insumo viene vacio significa que no encontró el insumo, por lo tanto hay que cargarlo
      if ($params['id_insumo'] == "") {
          $insumo = new InsumoController();
          $id_insumo = $insumo->store_insumo($request);
      } else {
          $id_insumo = intval($params['id_insumo']);
      }

      //comprobaciones
      $ins_existente = DB::table('rel_industria_insumo')
          ->where('id_industria', $id_industria)
          ->where('id_insumo',  $id_insumo)
          ->where('id_rel_industria_insumo','!=',intval($params['id_rel_industria_insumos']))
          ->get();

       //si el insumo ya esta cargado para esta industria devolver msj
      if (count($ins_existente) > 0) {
          $msg = "¡Este insumo ya se encuentra cargado para esta industria!";
          $status = 1;
      } else {


        if ($params['es_propio_insumo'] == "P") {


            $pais = intval($params['id_pais_insumo']);
            $localidad = intval($params['id_localidad_insumo']);

            $motivo = null;
            $detalles = "";
        } else {

            $pais = intval($params['id_pais_insumo']);
            $localidad = intval($params['id_localidad_insumo']);
            $motivo = $params['motivo_importacion_insumo'] !== "" ? intval($params['motivo_importacion_insumo']) : NULL;
            $detalles = isset($params['detalles_insumo']) ?  $params['detalles_insumo'] : "";
        }





            $id_rel_producto_actividad = DB::table('rel_industria_insumo')
                ->where('id_rel_industria_insumo', intval($params['id_rel_industria_insumos']))
                ->update([
                  'id_industria' => $id_industria,
                  'id_insumo' => $id_insumo,
                  'id_unidad_de_medida' => intval($params['medida_insumo']),
                  'cantidad' => intval($params['cantidad_insumo']),
                  'es_propio' => $params['es_propio_insumo'],
                  'id_localidad' =>  $localidad ,
                  'id_pais' => $pais,
                  'id_motivo_importacion' => $motivo,
                  'detalles' => $detalles,

                  'fecha_de_actualizacion' => Carbon::now(),
                ]);


        $msg = "¡Datos Actualizados exitosamente!";

      }

      return response()->json(array('status' => $status, 'msg' => $msg), 200);


    }

    public function deleteRel (Request $request){

      if(DB::table('rel_industria_insumo')->where('id_rel_industria_insumo', intval($request->id_rel_insumo))->delete()){
        return response()->json(array('status' => 200), 200);
      }

    }

    public function listInsumos (Request $request) {

      if ($request->ajax()) {
          $data = DB::table('rel_industria_insumo')
              ->join('insumo', 'rel_industria_insumo.id_insumo', '=', 'insumo.id_insumo')
              ->join('unidad_de_medida', 'rel_industria_insumo.id_unidad_de_medida', '=', 'unidad_de_medida.id_unidad_de_medida')
              ->where('id_industria', intval($request->id_industria)) //es el id_industira
              ->select(
                  'rel_industria_insumo.*',
                  'insumo.insumo as insumo_utilizado',
                  'unidad_de_medida.unidad_de_medida as unidad'

              )
              ->get();

          return Datatables::of($data)
              ->addIndexColumn()
              ->addColumn('action', function ($row) {

                  $actionBtn = '<span style="cursor: pointer;" data-placement="left" title="Ver Insumo" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalDetalleInsumo" data-backdrop="static" data-keyboard="false" onClick="VerInsumoAsignado(' . $row->id_rel_industria_insumo . ')"><i class="mdi mdi-eye font-22 text-danger"></i></span>
                                <span style="cursor: pointer;" data-placement="left" title="Actualizar Insumo" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalInsumo" data-backdrop="static" data-keyboard="false" onClick="UpdateInsumoAsignado('. $row->id_rel_industria_insumo .');"><i class="mdi mdi-table-edit font-22 text-danger"></i></span>
                                <span style="cursor: pointer;" title="Eliminar Insumo" onClick="EliminarInsumoAsignado('. $row->id_rel_industria_insumo .')"><i class="mdi mdi-delete font-22 text-danger"></i></span>';
                  return $actionBtn;
              })
              ->rawColumns(['action'])
              ->make(true);
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

    //funcion para buscar insumos
    public function search_insumo (Request $request) {
      if($request->search == ''){
         $insumos=DB::table('insumo')->orderby('insumo','asc')->select('id_insumo','insumo')->limit(5)->get();

     }else{
         $insumos=DB::table('insumo')->where("insumo", "LIKE", "%{$request->search}%")
         ->where('activo','S')
         ->get();
     }


     $response = array();
     foreach($insumos as $insumo){
        $response[] = array("value"=>$insumo->id_insumo,"label"=>trim($insumo->insumo));
     }

     return response()->json($response);
    }
}
