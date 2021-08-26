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
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeGenerales(Request $request)
    {
        $params = array();
        parse_str($request->data, $params);
        /* dd($params); 
        die(); */
        $status=200;
        //cargar industria
        $industria = new IndustriaController();
        $id_industria = $industria->store($request);


        //cargar periodo industria

        $per_act_indu = new PeriodoActividadIndustriaController();
        $id_periodo_indu = $per_act_indu->store($request, $id_industria);

        if($id_industria != "error" && $id_periodo_indu != "error" ){
            $msg = "¡Datos Guardados exitosamente!";
        }else{
            $status=1;
        }

     
        return response()->json(array(
            'status' => $status,
            'msg' => $msg,
            'id_industria' => $id_industria
        ), 200);


    }

    //saca los detalles de la actividad
    public function get_detalle_actividad(Request $request)
    {

        $response = array();

        $response = DB::table('rel_industria_actividad')
            ->join('actividad', 'rel_industria_actividad.id_actividad', '=', 'actividad.id_Actividad')
            ->join('industria', 'rel_industria_actividad.id_industria', '=', 'industria.id_industria')
            ->join('rubro_actividad', 'actividad.id_rubro', '=', 'rubro_actividad.id_rubro_actividad')
            ->where('id_rel_industria_actividad', intval($request->id))
            ->select(
                'rel_industria_actividad.*',
                'actividad.*',
                'industria.nombre_de_fantasia as nombre_industria',
                'rubro_actividad.*'
            )
            ->first();

        return response()->json($response);
    }

    //listar actividades de la industria
    public function get_act_ind(Request $request)
    {
        if ($request->ajax()) {

            $data = DB::table('rel_industria_actividad')
                ->join('actividad', 'rel_industria_actividad.id_actividad', '=', 'actividad.id_actividad')
                ->where('id_industria', intval($request->id_industria))
                ->where('anio',$request->periodo)
                ->where('fecha_fin',NULL)
                ->select(
                    'rel_industria_actividad.*',
                    'actividad.actividad as nombre_actividad',
                    'actividad.nomenclatura_ib as nomenclatura'
                )
                ->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $actionBtn = '<span style="cursor: pointer;" data-placement="left" title="Ver Actividad" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalDetalleActividad" data-backdrop="static" data-keyboard="false" onClick="VerActividad(' . $row->id_rel_industria_actividad . ')"><i class="mdi mdi-eye font-22 text-danger"></i></span>
                                    <span style="cursor: pointer;" data-placement="left" title="Actualizar Actividad" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalActividad" data-backdrop="static" data-keyboard="false" onClick="getActividad(' . $row->id_rel_industria_actividad . ')"><i class="mdi mdi-table-edit font-22 text-danger"></i></span>
                                   <span style="cursor: pointer;" data-placement="left" title="Asignar o Editar Producto Cargado" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalAsignaProducto" onClick="AddProductoActividad(' . $row->id_rel_industria_actividad . ',\'' . $row->nombre_actividad . '\')"><i class="mdi mdi-plus-outline font-22 text-danger"></i></span>
                                  <span style="cursor: pointer;" data-placement="left" title="Asignar o Editar Materia Prima Cargada" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalAsignaMateria" onclick="AddMateriaActividad(' . $row->id_rel_industria_actividad . ')"><i class="mdi mdi-basket-fill font-22 text-danger"></i></span>
                                  <span style="cursor: pointer;" data-placement="left" title="Dar de baja la actividad" onclick="BajaActividad(' . $row->id_rel_industria_actividad . ')"><i class="mdi mdi-arrow-down-bold-circle-outline font-22 text-danger"></i></span>
                                   <span style="cursor: pointer;" title="Eliminar Actividad" onClick="EliminarActividad(' . $row->id_rel_industria_actividad . ')"><i class="mdi mdi-delete font-22 text-danger"></i></span>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    

    //saca unidad de medida
    public function getUnidades()
    {
        $unidades = DB::table('unidad_de_medida')->where('activo', 'S')->get();

        $response = array();
        foreach ($unidades as $unidad) {
            $response[] = array("value" => $unidad->id_unidad_de_medida, "label" => trim($unidad->unidad_de_medida));
        }

        return response()->json($response);
    }

   


    //guarda actividad
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
        $date =$request->periodo;
        $status = 200;
        $act_principal = array();

        //comprobaciones


        if ($params['es_actividad_principal'] == 'S') {
            $act_principal = DB::table('rel_industria_actividad')
                ->where('id_industria', intval($params['id_industria_modal']))
                ->where('es_actividad_principal', 'S')
                ->where('anio',$date)
                ->where('fecha_fin',NULL)
                ->get();
        }

        $act_existente = DB::table('rel_industria_actividad')
            ->where('id_industria', intval($params['id_industria_modal']))
            ->where('id_actividad', intval($params['id_actividad']))
            ->where('anio',$date)
            ->where('fecha_fin',NULL)
            ->get();


        if (count($act_principal) > 0) {
            $msg = "¡Ya existe una actividad principal!";
            $status = 3;
        } else if (count($act_existente) > 0) {
            $msg = "¡Esta actividad ya se encuentra cargada!";
            $status = 4;
        } else {
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

    //actualiza actividad
    public function updateActividad(Request $request)
    {


        $params = array();
        parse_str($request->data, $params);
        $fecha = Carbon::createFromFormat('d-m-Y', $params['fecha_inicio'])->toDateTimeString();
        $date = Carbon::now()->format('Y');

        $status = 200;
        $act_principal = array();

        //comprobaciones


        if ($params['es_actividad_principal'] == 'S') {
            $act_principal = DB::table('rel_industria_actividad')
                ->where('id_rel_industria_actividad', '!=', intval($params['id_rel_industria_actividad']))
                ->where('id_industria', intval($params['id_industria_modal']))
                ->where('es_actividad_principal', 'S')
                 ->where('fecha_fin',NULL)
                ->get();
        }

        $act_existente = DB::table('rel_industria_actividad')
            ->where('id_rel_industria_actividad', '!=', intval($params['id_rel_industria_actividad']))
            ->where('id_industria', intval($params['id_industria_modal']))
            ->where('id_actividad', intval($params['id_actividad']))
             ->where('fecha_fin',NULL)
            ->get();


        if (count($act_principal) > 0) {
            $msg = "¡Ya existe una actividad principal!";
            $status = 3;
        } else if (count($act_existente) > 0) {
            $msg = "¡Esta actividad ya se encuentra cargada!";
            $status = 4;
        } else {
            $id_rel_actividad_industria = DB::table('rel_industria_actividad')
                ->where('id_rel_industria_actividad', intval($params['id_rel_industria_actividad']))
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

   

 

   

    //funcion para eliminar la actividad relacionad a la industria
    public function eliminarActividad(Request $request)
    {

        //id es el id de la relacion industria actividad
        DB::table('rel_actividad_producto')->where('id_rel_industria_actividad', intval($request->id))->delete();
        DB::table('rel_actividad_materia_prima')->where('id_rel_industria_actividad', intval($request->id))->delete();
        DB::table('rel_industria_actividad')->where('id_rel_industria_actividad', intval($request->id))->delete();

        return response()->json(array('status' => 200), 200);
    }

    //dar de baja la actividad
    public function BajaActividad(Request $request){
         DB::table('rel_industria_actividad')->where('id_rel_industria_actividad', intval($request->id))->update([
             'fecha_fin'=>Carbon::now()
         ]);

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
        $rel = DB::table('rel_persona_contribuyente')->where('id_rel_persona_contribuyente', $user->id_rel_persona_contribuyente)->select('id_contribuyente', 'id_persona')->first();
        $contribuyente = DB::table('contribuyente')->where('id_contribuyente', $rel->id_contribuyente)->first();
        $zona = PuntoCardinal::all();


        return view('Procedimientos.procedimientos', [
            'id_industria'=>$id,
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


    public function getTramite($id){
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

        
        
        $contribuyente = DB::table('contribuyente')->where('id_contribuyente', $rel->id_contribuyente)->first();
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
            

            $response=[];

            $response['industria']= $mi_industria[0]; 
            $response['tel_fijo_legal']=$rel->fijo_legal;
            $response['tel_celular_legal']=$rel->celular_legal;
            $response['cuit']=$cuit->cuit;

           return response()->json($response);

            
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
