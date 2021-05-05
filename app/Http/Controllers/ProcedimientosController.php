<?php

namespace App\Http\Controllers;

use App\Models\Industria;
use App\Models\PeriodoActividadIndustria;
use App\Models\Persona;
use Illuminate\Http\Request;
use App\Models\RegimenIB;
use App\Models\CondicionIva;
use App\Models\NaturalezaJuridica;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Table;
use App\Models\Contribuyente;
use App\Models\PeriodoActividadContribuyente;
use App\Models\PuntoCardinal;

use Yajra\DataTables\DataTables;


class ProcedimientosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $regimen = RegimenIB::where('activo', "S")->get();
        $iva = CondicionIva::where('activo', "S")->get();
        $naturaleza_juridica = NaturalezaJuridica::where('activo', "S")->get();

        $per_fiscal = DB::table('periodo_fiscal')->where('anio', Carbon::now()->format('Y'))->first();

        $user = auth()->user();
        $rel = DB::table('rel_persona_contribuyente')->where('id_rel_persona_contribuyente', $user->id_rel_persona_contribuyente)->select('id_contribuyente', 'id_persona')->first();
        $contribuyente = DB::table('contribuyente')->where('id_contribuyente', $rel->id_contribuyente)->first();
        $zona = PuntoCardinal::all();


        return view('Procedimientos.procedimientos', [
            'id_persona' => $rel->id_persona,
            'id_contribuyente' => $rel->id_contribuyente,
            'contribuyente' => $contribuyente,
            'per_fiscal' => $per_fiscal,
            'regimen' => $regimen,
            'condicion_iva' => $iva,
            'naturaleza_juridica' => $naturaleza_juridica,
            'zona' => $zona
        ]);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeGenerales(Request $request)
    {
        $params = array();
        parse_str($request->data, $params);


        //cargar industria
        $industria = new IndustriaController();
        $id_industria = $industria->store($request);


        //cargar periodo industria

        $per_act_indu = new PeriodoActividadIndustriaController();
        $id_periodo_indu = $per_act_indu->store($request, $id_industria);


        $msg = "¡Datos Guardados exitosamente!";
        return response()->json(array(
            'status' => 200,
            'msg' => $msg,
            'id_industria' => $id_industria
        ), 200);


    }

    public function get_detalle_actividad(Request $request){

        $response=array();

        $response=DB::table('rel_industria_actividad')
                ->join('actividad','rel_industria_actividad.id_actividad','=','actividad.id_Actividad')
                ->join('industria','rel_industria_actividad.id_industria','=','industria.id_industria')
                ->join('rubro_actividad','actividad.id_rubro','=','rubro_actividad.id_rubro_actividad')
                ->where('id_rel_industria_actividad',intval($request->id))
                ->select(
                    'rel_industria_actividad.*',
                    'actividad.*',
                    'industria.nombre_de_fantasia as nombre_industria',
                    'rubro_actividad.*'
                )
                ->first();

        return response()->json( $response);
    }

     public function get_act_ind(Request $request){
        if ($request->ajax()) {

            $data = DB::table('rel_industria_actividad')
                ->join('actividad','rel_industria_actividad.id_actividad','=','actividad.id_actividad')
                ->where('id_industria',intval($request->id_industria))
                ->select(
                    'rel_industria_actividad.*',
                    'actividad.actividad as nombre_actividad'
                )
                ->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){

                    $actionBtn =  '<span style="cursor: pointer;" data-placement="left" title="Ver Actividad" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalDetalleActividad" data-backdrop="static" data-keyboard="false" onClick="VerActividad('.$row->id_rel_industria_actividad.')"><i class="mdi mdi-eye font-22 text-danger"></i></span>
                                    <span style="cursor: pointer;" data-placement="left" title="Actualizar Actividad" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalActividad" data-backdrop="static" data-keyboard="false" onClick="getActividad('.$row->id_rel_industria_actividad.')"><i class="mdi mdi-table-edit font-22 text-danger"></i></span>
                                   <span style="cursor: pointer;" data-placement="left" title="Asignar o Editar Producto Cargado" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalAsignaProducto" onClick="AddProductoActividad('.$row->id_rel_industria_actividad.',\''.$row->nombre_actividad.'\')"><i class="mdi mdi-plus-outline font-22 text-danger"></i></span>
                                  <span style="cursor: pointer;" data-placement="left" title="Asignar o Editar Materia Prima Cargada" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalAsignaMateria" onclick="AddMateriaActividad('.$row->id_rel_industria_actividad.')"><i class="mdi mdi-basket-fill font-22 text-danger"></i></span>
                                   <span style="cursor: pointer;" title="Eliminar Actividad" onClick="EliminarActividad('.$row->id_rel_industria_actividad.')"><i class="mdi mdi-delete font-22 text-danger"></i></span>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function listRelActProd(Request $request){

         if ($request->ajax()) {
         $data = DB::table('rel_actividad_producto')
                ->join('producto','rel_actividad_producto.id_producto','=','producto.id_producto')
                ->join('unidad_de_medida','rel_actividad_producto.id_unidad_de_medida','=','unidad_de_medida.id_unidad_de_medida')

                ->where('id_rel_industria_actividad',intval($request->id_asignacion_producto)) //es el id_rel_industira_actividad
                ->select(
                    'rel_actividad_producto.*',
                    'producto.producto as nombre_producto',
                    'unidad_de_medida.unidad_de_medida'

                )
                ->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){

                    $actionBtn =  '<span style="cursor: pointer;" data-placement="left" title="Actualizar Producto" onclick="Update_Producto('.$row->id_rel_actividad_producto.')"><i class="mdi mdi-table-edit font-22 text-danger"></i></span>
                                    <span style="cursor: pointer;" onclick="EliminarProductoAsignado('.$row->id_rel_actividad_producto.')" title="Eliminar Producto"><i class="mdi mdi-delete font-24 text-danger"></i></span>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    public function listmatprima(Request $request){

         if ($request->ajax()) {
         $data = DB::table('rel_actividad_materia_prima')
                ->join('materia_prima','rel_actividad_materia_prima.id_materia_prima','=','materia_prima.id_materia_prima')
                ->join('unidad_de_medida','rel_actividad_materia_prima.unidad_de_medida','=','unidad_de_medida.id_unidad_de_medida')

                ->where('id_rel_industria_actividad',intval($request->id_rel_industria_actividad_materia_prima)) //es el id_rel_industira_actividad
                ->select(
                    'rel_actividad_materia_prima.*',
                    'materia_prima.materia_prima as nombre_materia_prima',
                    'unidad_de_medida.unidad_de_medida'

                )
                ->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){

                    $actionBtn =  '
                                    <span style="cursor: pointer;" onclick="EliminarMateriaPrimaAsignada('.$row->id_rel_actividad_materia_prima.')" title="Eliminar Materia prima"><i class="mdi mdi-delete font-24 text-danger"></i></span>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function getDatosProducto(Request $request){

        $response=DB::table('rel_actividad_producto')->where('id_rel_actividad_producto',intval($request->id_producto))
            ->join('producto','rel_actividad_producto.id_producto','=','producto.id_producto')
            ->select(
                'rel_actividad_producto.*',
                'producto.producto as nomproducto'
            )
            ->get();
         return response()->json( $response);
    }

    public function getUnidades(){
        $unidades= DB::table('unidad_de_medida')->where('activo','S')->get();

         $response = array();
        foreach($unidades as $unidad){
           $response[] = array("value"=>$unidad->id_unidad_de_medida,"label"=>trim($unidad->unidad_de_medida));
        }

        return response()->json($response);
    }

    public function motivoImportacion(){
         $unidades= DB::table('motivo_importacion')->where('activo','S')->get();

         $response = array();
        foreach($unidades as $unidad){
           $response[] = array("value"=>$unidad->id_motivo_importacion,"label"=>trim($unidad->motivo_importacion));
        }

        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeActividad(Request $request)
    {
        //esta funcion establece la relacion entre industria y actividad


        $params = array();
        parse_str($request->data, $params);
        $fecha = Carbon::createFromFormat('d-m-Y', $params['fecha_inicio'])->toDateTimeString();
        $date = Carbon::now()->format('Y');

        $status =200;
        $act_principal=array();

        //comprobaciones



        if($params['es_actividad_principal'] == 'S'){
            $act_principal = DB::table('rel_industria_actividad')
            ->where('id_industria', intval($params['id_industria_modal']))
            ->where('es_actividad_principal', 'S')
            ->get();
        }

        $act_existente= DB::table('rel_industria_actividad')
            ->where('id_industria', intval($params['id_industria_modal']))
            ->where('id_actividad', intval($params['id_actividad']))
            ->get();


        if (count($act_principal) > 0) {
            $msg = "¡Ya existe una actividad principal!";
            $status=3;
        }else if(count($act_existente) > 0){
             $msg = "¡Esta actividad ya se encuentra cargada!";
             $status=4;
        }else {
            $id_rel_actividad_industria = DB::table('rel_industria_actividad')->insertGetId([
                'id_industria' => intval($params['id_industria_modal']),
                'id_actividad' => intval($params['id_actividad']),
                'observacion' => $params['observacion'],
                'anio' => $date,
                'fecha_inicio' => $fecha,
                'fecha_de_actualizacion' => Carbon::now(),
                'es_actividad_principal' => $params['es_actividad_principal']
            ]);

            $msg = "¡Datos Guardados exitosamente!";
        }


        return response()->json(array('status' => $status, 'msg' => $msg), 200);


    }

    public function updateActividad(Request $request){


        $params = array();
        parse_str($request->data, $params);
        $fecha = Carbon::createFromFormat('d-m-Y', $params['fecha_inicio'])->toDateTimeString();
        $date = Carbon::now()->format('Y');

        $status =200;
        $act_principal=array();

        //comprobaciones



        if($params['es_actividad_principal'] == 'S'){
            $act_principal = DB::table('rel_industria_actividad')
            ->where('id_rel_industria_actividad','!=',intval($params['id_rel_industria_actividad']))
            ->where('id_industria', intval($params['id_industria_modal']))
            ->where('es_actividad_principal', 'S')
            ->get();
        }

        $act_existente= DB::table('rel_industria_actividad')
            ->where('id_rel_industria_actividad','!=',intval($params['id_rel_industria_actividad']))
            ->where('id_industria', intval($params['id_industria_modal']))
            ->where('id_actividad', intval($params['id_actividad']))
            ->get();


        if (count($act_principal) > 0) {
            $msg = "¡Ya existe una actividad principal!";
            $status=3;
        }else if(count($act_existente) > 0){
             $msg = "¡Esta actividad ya se encuentra cargada!";
             $status=4;
        }else {
            $id_rel_actividad_industria = DB::table('rel_industria_actividad')
                ->where('id_rel_industria_actividad',intval($params['id_rel_industria_actividad']))
                ->update([
                'id_industria' => intval($params['id_industria_modal']),
                'id_actividad' => intval($params['id_actividad']),
                'observacion' => $params['observacion'],
                'anio' => $date,
                'fecha_inicio' => $fecha,
                'fecha_de_actualizacion' => Carbon::now(),
                'es_actividad_principal' => $params['es_actividad_principal']
            ]);

            $msg = "¡Datos Actualizados exitosamente!";
        }


        return response()->json(array('status' => $status, 'msg' => $msg), 200);
    }

    public function saveAsignacionProducto(Request $request){
         $params=[];
         parse_str($request->data,$params);


        $date = Carbon::now()->format('Y');

        $status =200;


        //comprobaciones
        $prod_existente= DB::table('rel_actividad_producto')
            ->where('id_rel_industria_actividad', intval($params['id_rel_industria_actividad']))
            ->where('id_producto', intval($params['id_producto']))
            ->get();


        if(count($prod_existente) > 0){
             $msg = "¡Este producto ya se encuentra cargado!";
             $status=1;
        }else {
            $id_rel_producto_actividad = DB::table('rel_actividad_producto')->insertGetId([
                'id_rel_industria_actividad' => intval($params['id_rel_industria_actividad']),
                'id_producto' => intval($params['id_producto']),
                'id_unidad_de_medida' => intval($params['medida_producto']),
                'cantidad_producida' => intval($params['cantidad_producida']),
                'porcentaje_sobre_produccion' =>intval( $params['porcentaje_sobre_produccion']),
                'ventas_en_provincia' =>intval( $params['ventas_en_provincia']),
                'ventas_en_otras_provincias' =>intval( $params['ventas_en_otras_provincias']),
                'ventas_internacionales' =>intval( $params['ventas_internacionales']),
                'anio' => $date,
                'fecha_de_actualizacion' => Carbon::now(),
            ]);

            $msg = "¡Datos Guardados exitosamente!";
        }


        return response()->json(array('status' => $status, 'msg' => $msg), 200);

    }

    public function saveAsignacionMateria(Request $request){
         $params=[];
         parse_str($request->data,$params);


        $date = Carbon::now()->format('Y');

        $status =200;

         //comprobaciones
        $prod_existente= DB::table('rel_actividad_materia_prima')
            ->where('id_rel_industria_actividad', intval($params['id_rel_industria_actividad_materia_prima']))
            ->where('id_materia_prima', intval($params['id_materia_prima']))
            ->get();




        if(count($prod_existente) > 0){
             $msg = "¡Esta materia ya se encuentra cargada!";
             $status=1;
        }else {

            if($params['id_materia_prima'] == ""){
                 //cargar industria

                    $materia = new MateriaPrimaController();
                    $id_materia= $materia->store($request);
            }else{

                $id_materia=intval($params['id_materia_prima']);



            }

             $id_rel_actividad_materia_prima = DB::table('rel_actividad_materia_prima')->insertGetId([
                'id_rel_industria_actividad' => intval($params['id_rel_industria_actividad_materia_prima']),
                'id_materia_prima' => $id_materia,
                'unidad_de_medida' => intval($params['medida_materia']),
                'cantidad' => intval($params['cantidad_materia']),
                'es_propio' => $params['es_propio_materia'],
                'id_localidad' => intval($params['id_localidad3']),
                'id_pais' => intval($params['id_pais']),

                'id_motivo_importacion' => intval($params['motivo_importacion_materia']),
                'detalles' => intval($params['detalles_materia']),
                'anio' => $date,
                'fecha_de_actualizacion' => Carbon::now(),
            ]);

            $msg = "¡Datos Guardados exitosamente!";

        }


        return response()->json(array('status' => $status, 'msg' => $msg), 200);
    }

    public function updateRelActProd(Request $request){


        $params=[];

        parse_str($request->data, $params);


        $date = Carbon::now()->format('Y');

        $status =200;

        //comprobaciones
        /*$prod_existente= DB::table('rel_actividad_producto')
            ->where('id_rel_industria_actividad','!=', intval($params['id_rel_industria_actividad']))
            ->where('id_producto', intval($params['id_producto']))
            ->get();*/


        /*if(count($prod_existente) > 0){
             $msg = "¡Este producto ya se encuentra cargado!";
             $status=1;
        }else {*/
            $id_rel_producto_actividad = DB::table('rel_actividad_producto')
                ->where('id_rel_actividad_producto',intval($params['id_rel_actividad_productos']))
                ->update([
                'id_rel_industria_actividad' => intval($params['id_rel_industria_actividad']),
                'id_producto' => intval($params['id_producto']),
                'id_unidad_de_medida' => intval($params['medida_producto']),
                'cantidad_producida' => intval($params['cantidad_producida']),
                'porcentaje_sobre_produccion' =>intval( $params['porcentaje_sobre_produccion']),
                'ventas_en_provincia' =>intval( $params['ventas_en_provincia']),
                'ventas_en_otras_provincias' =>intval( $params['ventas_en_otras_provincias']),
                'ventas_internacionales' =>intval( $params['ventas_internacionales']),
                'anio' => $date,
                'fecha_de_actualizacion' => Carbon::now(),
            ]);

            $msg = "¡Datos Actualizados exitosamente!";
       // }


        return response()->json(array('status' => $status, 'msg' => $msg), 200);

    }

   public function eliminarProductoAsignado(Request $request){

        if(DB::table('rel_actividad_producto')->where('id_rel_actividad_producto',intval($request->id_rel_act_producto))->delete()){
             return response()->json(array('status' => 200), 200);
        }

   }


   public function eliminarMateriaPrima(Request $request){

        if(DB::table('rel_actividad_materia_prima')->where('id_rel_actividad_materia_prima',intval($request->id_materia))->delete()){
             return response()->json(array('status' => 200), 200);
        }

   }

   //funcion para eliminar la actividad relacionad a la industria
   public function eliminarActividad(Request $request){

        //id es el id de la relacion industria actividad
         DB::table('rel_actividad_producto')->where('id_rel_industria_actividad',intval($request->id))->delete();
         DB::table('rel_actividad_materia_prima')->where('id_rel_industria_actividad',intval($request->id))->delete();
         DB::table('rel_industria_actividad')->where('id_rel_industria_actividad',intval($request->id))->delete();

         return response()->json(array('status' => 200), 200);
   }




    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $regimen = RegimenIB::where('activo', "S")->get();
        $iva = CondicionIva::where('activo', "S")->get();
        $naturaleza_juridica = NaturalezaJuridica::where('activo', "S")->get();

        $per_fiscal = DB::table('periodo_fiscal')->where('anio', Carbon::now()->format('Y'))->first();

        $user = auth()->user();

        $rel = DB::table('rel_persona_contribuyente')
            ->join('persona', 'rel_persona_contribuyente.id_persona', '=', 'persona.id_persona')
            ->select('rel_persona_contribuyente.id_contribuyente',
                'rel_persona_contribuyente.id_persona',
                'persona.tel_fijo as fijo_legal',
                'persona.tel_celular as celular_legal',
            )
            ->where('id_rel_persona_contribuyente', $user->id_rel_persona_contribuyente)
            ->first();

        $cuit = DB::table('contribuyente')->where('id_contribuyente', $rel->id_contribuyente)->select('cuit')->first();
        $zona = PuntoCardinal::all();

        $mi_industria = DB::table('industria')
            ->join('contribuyente', 'industria.id_contribuyente', '=', 'contribuyente.id_contribuyente')
            ->join('punto_cardinal as punto_planta', 'industria.id_punto_cardinal', '=', 'punto_planta.id_punto_cardinal')
            ->join('punto_cardinal as punto_legal', 'contribuyente.id_punto_cardinal', '=', 'punto_legal.id_punto_cardinal')
            ->join('localidad as localidad_planta', 'industria.id_localidad', '=', 'localidad_planta.id_localidad')
            ->join('provincia as provincia_planta', 'localidad_planta.id_provincia', '=', 'provincia_planta.id_provincia')
            ->join('barrio as barrio_planta', 'industria.id_barrio', '=', 'barrio_planta.id_barrio')
            ->join('calle as calle_planta', 'industria.id_calle', '=', 'calle_planta.id_calle')
            ->join('barrio', 'industria.id_barrio', '=', 'barrio.id_barrio')
            ->join('calle', 'industria.id_calle', '=', 'calle.id_calle')
            ->join('regimen_ib', 'contribuyente.id_regimen_ib', '=', 'regimen_ib.id_regimen_ib')
            ->join('condicion_iva', 'contribuyente.id_condicion_iva', '=', 'condicion_iva.id_condicion_iva')
            ->join('naturaleza_juridica', 'contribuyente.id_naturaleza_juridica', '=', 'naturaleza_juridica.id_naturaleza_juridica')
            ->join('localidad as localidad_legal', 'contribuyente.id_localidad', '=', 'localidad_legal.id_localidad')
            ->join('provincia as provincia_legal', 'localidad_legal.id_provincia', '=', 'provincia_legal.id_provincia')
            ->join('barrio as barrio_legal', 'contribuyente.id_barrio', '=', 'barrio_legal.id_barrio')
            ->join('calle as calle_legal', 'contribuyente.id_calle', '=', 'calle_legal.id_calle')
            ->select(
                'industria.*',
                'industria.id_localidad as id_localidad_planta',
                'industria.id_barrio as id_barrio_planta',
                'industria.id_calle as id_calle_planta',
                'localidad_planta.localidad as localidad_planta',
                'localidad_planta.id_provincia as id_provincia_planta',
                'provincia_planta.provincia as provincia_planta',
                'barrio_planta.barrio as barrio_planta',
                'calle_planta.calle as calle_planta',
                'punto_planta.id_punto_cardinal as id_punto_planta',
                'punto_planta.punto_cardinal as punto_planta',
                'industria.numero as nro_calle_planta',
                'industria.piso as piso_planta',
                'industria.depto as depto_planta',
                'industria.referencia_domicilio as referencia_planta',

                'contribuyente.*',
                'contribuyente.id_localidad as id_localidad_legal',
                'contribuyente.id_barrio as id_barrio_legal',
                'contribuyente.id_calle as id_calle_legal',
                'localidad_legal.localidad as localidad_legal',
                'localidad_legal.id_provincia as id_provincia_legal',
                'provincia_legal.provincia as provincia_legal',
                'barrio_legal.barrio as barrio_legal',
                'calle_legal.calle as calle_legal',
                'punto_legal.punto_cardinal as punto_legal',
                'punto_legal.id_punto_cardinal as id_punto_legal',
                'contribuyente.numero as nro_calle_legal',
                'contribuyente.piso as piso_legal',
                'contribuyente.depto as depto_legal',
                'contribuyente.referencias_domicilio as referencia_legal',


                'regimen_ib.regimen_ib',
                'condicion_iva.condicion_iva',
                'naturaleza_juridica.naturaleza_juridica',

            )
            ->where('industria.id_industria', $id)
            ->get();


        return view('Procedimientos.edit_procedimientos', [
            'id_persona' => $rel->id_persona,
            'id_contribuyente' => $rel->id_contribuyente,
            'tel_fijo_legal' => $rel->fijo_legal,
            'tel_celular_legal' => $rel->celular_legal,
            'cuit' => $cuit,
            'per_fiscal' => $per_fiscal,
            'regimen' => $regimen,
            'condicion_iva' => $iva,
            'naturaleza_juridica' => $naturaleza_juridica,
            'zona' => $zona,
            'mi_industria' => $mi_industria
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateGeneral(Request $request)
    {

        $params = array();
        parse_str($request->data, $params);


        //cargar industria
        $industria = new IndustriaController();
        $industria->update($request, intVal($params['id_industria']));


        //cargar periodo industria

        $per_act_indu = new PeriodoActividadIndustriaController();
        $per_act_indu->update($request, intVal($params['id_industria']));

        return response()->json(['success' => 1]);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
