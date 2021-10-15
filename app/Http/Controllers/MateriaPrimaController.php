<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Carbon;
use PhpParser\Node\Expr\New_;

class MateriaPrimaController extends Controller
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


    //listar materia prima modal
    public function listmatprima(Request $request)
    {

        if ($request->ajax()) {
            $data = DB::table('rel_actividad_materia_prima')
                ->join('materia_prima', 'rel_actividad_materia_prima.id_materia_prima', '=', 'materia_prima.id_materia_prima')
                ->join('unidad_de_medida', 'rel_actividad_materia_prima.id_unidad_de_medida', '=', 'unidad_de_medida.id_unidad_de_medida')
                ->where('id_rel_industria_actividad', intval($request->id_rel_industria_actividad_materia_prima)) //es el id_rel_industira_actividad
                ->where('anio',$request->p_f)
                ->select(
                    'rel_actividad_materia_prima.*',
                    'materia_prima.materia_prima as nombre_materia_prima',
                    'unidad_de_medida.unidad_de_medida'

                )
                ->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $actionBtn = '<span style="cursor: pointer;" onclick="EliminarMateriaPrimaAsignada(' . $row->id_rel_actividad_materia_prima . ')" title="Eliminar Materia prima"><i class="mdi mdi-delete font-24 text-danger"></i></span>
                    
                                 <span style="cursor: pointer;" data-placement="left" title="Actualizar Materia Prima" onclick="UpdateMateriaPrima(' . $row->id_rel_actividad_materia_prima . ');"><i class="mdi mdi-table-edit font-22 text-danger"></i></span>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }


    //saca motivos de importacion
    public function motivoImportacion()
    {
        $unidades = DB::table('motivo_importacion')->where('activo', 'S')->get();

        $response = array();
        foreach ($unidades as $unidad) {
            $response[] = array("value" => $unidad->id_motivo_importacion, "label" => trim($unidad->motivo_importacion));
        }

        return response()->json($response);
    }


    //asigna materia prima a la actividad
    public function saveAsignacionMateria(Request $request)
    {
        $params = [];
        parse_str($request->data, $params);


        $date = Carbon::now()->format('Y');
        $periodo_fiscal= $request->p_f;

        $status = 200;

        if ($params['id_materia_prima'] == "") {
            $materia = new MateriaPrimaController();
            $id_materia = $materia->store($request);
        } else {
            $id_materia = intval($params['id_materia_prima']);
        }

        //comprobaciones
        $mat_existente = DB::table('rel_actividad_materia_prima')
            ->where('id_rel_industria_actividad', intval($params['id_rel_industria_actividad_materia_prima']))
            ->where('id_materia_prima', $id_materia)
            ->where('anio',$periodo_fiscal)
            ->get();


        if (count($mat_existente) > 0) {
            $msg = "¡Esta materia ya se encuentra cargada en esta actividad!";
            $status = 1;
        } else {

            if ($params['es_propio_materia'] == "P") {

                $pais_localidad = DB::table('rel_industria_actividad')
                    ->where('id_rel_industria_actividad', intval($params['id_rel_industria_actividad_materia_prima']))
                    ->join('industria', 'rel_industria_actividad.id_industria', 'industria.id_industria')
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

                //si no vienen ids de paises localidad y provincia: cargarlos

                if($params['id_pais'] == ""){
                    $nom_pais=strtoupper($params['search_pais']);
                    $pais_store=New PaisController();
                    $id_pais_store=$pais_store->store($nom_pais); 
                    $pais=$id_pais_store;
                }else{
                    $pais = intval($params['id_pais']);
                }

                if($params['id_provincia_mp'] == ""){
                    $nom_provincia=strtoupper($params['search_provincia']);
                    $provincia_store= New ProvinciaController();
                    $id_prov_store=$provincia_store->store($nom_provincia,$pais);
                    $provincia=$id_prov_store;
                }else{
                    $provincia= intval($params['id_provincia_mp']);
                }

                if($params['id_localidad3'] == ""){
                    $nom_localidad=strtoupper($params['search_localidad32']);
                    $localidad_store=New LocalidadController();
                    $id_localidad_store=$localidad_store->store($nom_localidad,$provincia);
                    $localidad=$id_localidad_store;
                }else{
                    $localidad=intval($params['id_localidad3']);
                }

                
                $motivo = intval($params['motivo_importacion_materia']);
                $detalles="";
                if($motivo == 4){
                    $detalles = $params['detalles_materia']; //si el motivo es "otros"
                }
               
            }

            $id_rel_actividad_materia_prima = DB::table('rel_actividad_materia_prima')->insertGetId([
                'id_rel_industria_actividad' => intval($params['id_rel_industria_actividad_materia_prima']),
                'id_materia_prima' => $id_materia,
                'id_unidad_de_medida' => intval($params['medida_materia']),
                'cantidad' => intval($params['cantidad_materia']),
                'es_propio' => $params['es_propio_materia'],
                'id_localidad' => $localidad,
                'id_pais' => $pais,
                'id_motivo_importacion' => $motivo,
                'detalles' => $detalles,
                'anio' => $periodo_fiscal,
                'fecha_de_actualizacion' => Carbon::now(),
            ]);

            $msg = "¡Datos Guardados exitosamente!";
        }


        return response()->json(array('status' => $status, 'msg' => $msg), 200);
    }
    public function updateRelActMat(Request $request)
    {

        $params = [];
        parse_str($request->data, $params);

      
        $periodo_fiscal= $request->p_f;

        $status = 200;


        if ($params['id_materia_prima'] == "") {
            $materia = new MateriaPrimaController();
            $id_materia = $materia->store($request);
        } else {
            $id_materia = intval($params['id_materia_prima']);
        }

        //comprobaciones
        $mat_existente = DB::table('rel_actividad_materia_prima')
            ->where('id_rel_industria_actividad', intval($params['id_rel_industria_actividad_materia_prima']))
            ->where('id_materia_prima',$id_materia)
            ->where('id_rel_actividad_materia_prima', '!=', intval($params['id_asignacion_materia']))
            ->where('anio',$periodo_fiscal)
            ->get();


        $materia_nombre_iguales = DB::table('materia_prima')->where('materia_prima', $params['search_materia'])
            ->where('id_materia_prima', '!=',  intval($params['id_materia_prima']))
            ->get();

        if (count($materia_nombre_iguales) >= 1) {

            $msg = "¡Ya existe una materia prima con el mismo nombre!";
            $status = 1;
        } else if (count($mat_existente) > 0) {
            $msg = "¡Esta materia ya se encuentra cargada en esta actividad!";
            $status = 1;
        } else {


            //comprobacion si el materia esta siendo utilizado

            $mat_utilizado = DB::table('rel_actividad_materia_prima')
                ->where('id_rel_industria_actividad', '!=', intval($params['id_rel_industria_actividad_materia_prima']))
                ->where('id_materia_prima', $id_materia)
                ->where('id_rel_actividad_materia_prima', '!=', intval($params['id_asignacion_materia']))
                ->get();


            if (count($mat_utilizado) < 1) {
                //si el materia no est'a siendo utilizado lo edito
                $materia = new MateriaPrimaController();
                $id_materia = $materia->update($request, intval($params['id_materia_prima']));
            } else {
                //tengo que cargar uno nuevo
                $materia = new MateriaPrimaController();
                $id_materia = $materia->store($request);
            }


            if ($params['es_propio_materia'] == "P") {

                $pais_localidad = DB::table('rel_industria_actividad')
                    ->where('id_rel_industria_actividad', intval($params['id_rel_industria_actividad_materia_prima']))
                    ->join('industria', 'rel_industria_actividad.id_industria', 'industria.id_industria')
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

                //si no vienen ids de paises localidad y provincia: cargarlos

                if($params['id_pais'] == ""){
                    $nom_pais=strtoupper($params['search_pais']);
                    $pais_store=New PaisController();
                    $id_pais_store=$pais_store->store($nom_pais); 
                    $pais=$id_pais_store;
                }else{
                    $pais = intval($params['id_pais']);
                }

                if($params['id_provincia_mp'] == ""){
                    $nom_provincia=strtoupper($params['search_provincia']);
                    $provincia_store= New ProvinciaController();
                    $id_prov_store=$provincia_store->store($nom_provincia,$pais);
                    $provincia=$id_prov_store;
                }else{
                    $provincia= intval($params['id_provincia_mp']);
                }

                if($params['id_localidad3'] == ""){
                    $nom_localidad=strtoupper($params['search_localidad32']);
                    $localidad_store=New LocalidadController();
                    $id_localidad_store=$localidad_store->store($nom_localidad,$provincia);
                    $localidad=$id_localidad_store;
                }else{
                    $localidad=intval($params['id_localidad3']);
                }

                
                $motivo = intval($params['motivo_importacion_materia']);
                $detalles="";
                if($motivo == 4){
                    $detalles = $params['detalles_materia']; //si el motivo es "otros"
                }
               
            }

            $id_rel_actividad_materia_prima = DB::table('rel_actividad_materia_prima')
                ->where('id_rel_actividad_materia_prima', intval($params['id_asignacion_materia']))
                ->update([
                    'id_rel_industria_actividad' => intval($params['id_rel_industria_actividad_materia_prima']),
                    'id_materia_prima' =>intval($params['id_materia_prima']),
                    'id_unidad_de_medida' => intval($params['medida_materia']),
                    'cantidad' => intval($params['cantidad_materia']),
                    'es_propio' => $params['es_propio_materia'],
                    'id_localidad' => $localidad,
                    'id_pais' => $pais,
                    'id_motivo_importacion' => $motivo,
                    'detalles' => $detalles,
                    //'anio' => $date,
                    'fecha_de_actualizacion' => Carbon::now(),
                ]);

            $msg = "¡Datos Actualizados exitosamente!";
        }


        return response()->json(array('status' => $status, 'msg' => $msg), 200);
    }


    //elimina materia prima asignada a ala actividad
    public function eliminarMateriaPrima(Request $request)
    {

        if (DB::table('rel_actividad_materia_prima')->where('id_rel_actividad_materia_prima', intval($request->id_materia))->delete()) {
            return response()->json(array('status' => 200), 200);
        }
    }


    public function getRelMatPrima(Request $request)
    {


        $materia = DB::table('rel_actividad_materia_prima')
            ->where('id_rel_actividad_materia_prima', intval($request->id_materia))
            ->join('materia_prima', 'rel_actividad_materia_prima.id_materia_prima', 'materia_prima.id_materia_prima')
            ->join('localidad', 'rel_actividad_materia_prima.id_localidad', 'localidad.id_localidad')
            ->join('pais', 'rel_actividad_materia_prima.id_pais', 'pais.id_pais')
            ->join('provincia', 'localidad.id_provincia', 'provincia.id_provincia')
            ->select(
                'rel_actividad_materia_prima.*',
                'materia_prima.materia_prima',
                'pais.pais',
                'localidad.localidad',
                'provincia.id_provincia',
                'provincia.provincia'
            )

            ->get();
        return $materia;
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
     * @return int
     */
    public function store(Request $request)
    {
        $params = [];
        parse_str($request->data, $params);

        //comprobar si la materia existe; si existe se devuelve id de la materia
        $result = DB::table('materia_prima')->where('materia_prima', $params['search_materia'])->get();

        if (count($result) >= 1) {
            //devulvo id
            $response = $result[0]['id_materia_prima'];
        } else {
            //si no existe guardarla
            $id = DB::table('materia_prima')->insertGetId([
                'materia_prima' => $params['search_materia'],
                'activo' => 'S'
            ]);

            //devuelvo id
            $response = $id;
        }
        return $response;
    }

    public function getMateriaPrima(Request $request)
    {

        if ($request->search == '') {
            $materias = DB::table('materia_prima')->select('id_materia_prima', 'materia_prima')->limit(5)->get();
        } else {
            $materias = DB::table('materia_prima')->where("materia_prima", "LIKE", "%{$request->search}%")
                ->where('activo', 'S')
                ->get();
        }


        $response = array();
        foreach ($materias as $materia) {
            $response[] = array("value" => $materia->id_materia_prima, "label" => trim($materia->materia_prima));
        }

        return response()->json($response);
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
        $params = [];
        parse_str($request->data, $params);

        if (
            DB::table('materia_prima')->where('id_materia_prima', intval($params['id_materia_prima']))
            ->update(['materia_prima' => $params['search_materia']])
        ) {
            return intval($params['id_materia_prima']);
        }
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
