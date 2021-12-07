<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use Carbon\Carbon;

class PersonaController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $localidad, $barrio, $calle)
    {


        $persona = new Persona();

        $persona->documento = $request->documento;
        $persona->id_tipo_de_documento = $request->id_tipo_de_documento;
        $persona->nombre = $request->nombre;
        $persona->id_localidad = $localidad;
        $persona->id_barrio = $barrio;
        $persona->id_calle = $calle;
        $persona->numero = $request->nro_calle;
        $persona->piso = $request->nro_piso;
        $persona->depto = $request->nro_departamento;
        $persona->referencias_domicilio = $request->referencia;
        $persona->tel_celular = $request->celular;
        $persona->fecha_de_actualizacion = Carbon::now();

        $dni1 = $request->file('dniFrente');
        $dni2 = $request->file('dniDorso');

        $fecha = \Carbon\Carbon::now()->format('d-m-Y');

        //guardar imagen


        //guardo en disco para pdfs
        $path1 = $dni1->storeAs("/documents/dni", ($request->documento . "_" . "frente" . "_" . $fecha . '.' . $dni1->extension()));

        $path2 = $dni2->storeAs("/documents/dni", ($request->documento . "_" . "dorso" . "_" . $fecha . '.' . $dni2->extension()));

        $persona->frente_dni = $path1;
        $persona->dorso_dni = $path2;


        $persona->save();
        //id del registro que se acaba de cargar
        $id = $persona->id_persona;

        return $id;
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updatePersona(Request $request)
    {

        $params = array();
        parse_str($request->data, $params);

        dd($params);
        die();

        /*$persona=Persona::find($params['id_persona']);

        $persona->id_localidad=intval($params['id_localidad_administracion']);
        $contribuyente->id_barrio=intval($params['id_barrio_administracion']);
        $contribuyente->id_calle=intval($params['id_calle_administracion']);
        $contribuyente->numero=$params['nro_calle_legal'];
        $contribuyente->piso=$params['nro_piso_legal'];
        $contribuyente->depto=$params['nro_departamento_legal'];
        $contribuyente->referencias_domicilio=$params['referencia_legal'];
*/
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
