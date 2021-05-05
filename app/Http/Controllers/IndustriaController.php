<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Industria;
use Carbon\Carbon;

class IndustriaController extends Controller
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
 /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function getIndustria(Request $request)
    {
        dd($request->id_contribuyente);
            die();

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = array();
        parse_str($request->data, $params);

        $fecha = Carbon::createFromFormat('d-m-Y', $params['fecha_actividad_industria'])->toDateTimeString();


        $industria = new Industria();

        $industria->id_contribuyente = intval($params['id_contribuyente']);
        $industria->nombre_de_fantasia = $params['nombre_de_fantasia'];
        $industria->id_punto_cardinal = intval($params['zona']);
        $industria->id_localidad = intval($params['id_localidad']);
        $industria->id_barrio = intval($params['id_barrio']);
        $industria->id_calle = intval($params['id_calle']);
        $industria->numero = $params['nro_calle_panta'];
        $industria->piso = $params['nro_piso_planta'];
        $industria->depto = $params['nro_departamento_planta'];
        $industria->referencia_domicilio = $params['referencia_planta'];
        $industria->tel_fijo = $params['tel_fijo'];
        $industria->tel_celular = $params['tel_celular'];
        $industria->cod_postal = $params['cod_postal'];
        $industria->es_casa_central = $params['es_casa_central'];
        $industria->latitud = floatval($params['latitud']);
        $industria->longitud = floatval($params['longitud']);
        $industria->email = $params['email'];
        $industria->pagina_web = $params['pagina_web'];
        $industria->fecha_inicio = $fecha;
        $industria->fecha_de_actualizacion = Carbon::now();
        $industria->es_zona_industrial = $params['zona_industrial'];

        $industria->save();
        $id = $industria->id_industria;

        return $id;

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $params = array();
        parse_str($request->data, $params);

        $fecha = Carbon::createFromFormat('d-m-Y', $params['fecha_actividad_industria'])->toDateTimeString();


        $industria =Industria::find($id);

        $industria->id_contribuyente = intval($params['id_contribuyente']);
        $industria->nombre_de_fantasia = $params['nombre_de_fantasia'];
        $industria->id_punto_cardinal = intval($params['zona']);
        $industria->id_localidad = intval($params['id_localidad']);
        $industria->id_barrio = intval($params['id_barrio']);
        $industria->id_calle = intval($params['id_calle']);
        $industria->numero = $params['nro_calle_panta'];
        $industria->piso = $params['nro_piso_planta'];
        $industria->depto = $params['nro_departamento_planta'];
        $industria->referencia_domicilio = $params['referencia_planta'];
        $industria->tel_fijo = $params['tel_fijo'];
        $industria->tel_celular = $params['tel_celular'];
        $industria->cod_postal = $params['cod_postal'];
        $industria->es_casa_central = $params['es_casa_central'];
        $industria->latitud = floatval($params['latitud']);
        $industria->longitud = floatval($params['longitud']);
        $industria->email = $params['email'];
        $industria->pagina_web = $params['pagina_web'];
        $industria->fecha_inicio = $fecha;
        $industria->fecha_de_actualizacion = Carbon::now();
        $industria->es_zona_industrial = $params['zona_industrial'];

        $industria->save();
        $id = $industria->id_industria;

        return $id;
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
