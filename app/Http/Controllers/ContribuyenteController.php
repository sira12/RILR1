<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contribuyente;
use Carbon\Carbon;

class ContribuyenteController extends Controller
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
    public function store(Request $request)
    {


        $contribuyente = new Contribuyente();

        $contribuyente->cuit = intval($request->cuit);
        $contribuyente->razon_social = $request->razonsocial;

        $contribuyente->email_fiscal = $request->email_fiscal;
        $contribuyente->fecha_de_actualizacion = Carbon::now();
        $contribuyente->activo = "P";
        $contribuyente->id_persona_juridica = $request->tipo_personeria;


        $afip = $request->file('afip');
        $nombre_afip = strtolower($afip->getClientOriginalName());

        //compruebo mimes
        $findme0   = '.jpg';
        $findme   = '.png';
        $findme2 = '.pdf';

        $pos0 = strpos($nombre_afip, $findme0);
        $pos1 = strpos($nombre_afip, $findme);
        $pos2 = strpos($nombre_afip, $findme2);
        $fecha = \Carbon\Carbon::now()->format('d-m-Y');

        //guardar imagen
            //detectar mime, para mandar a un disco u otro
            if ($pos1 !== false || $pos0 !== false) {
                //es una imagen,guardo en disco para imagenes

                $path = $afip->storeAs("/images/contribuyentes",($request->cuit . "_" . $fecha . '.' . $afip->extension()));

                $contribuyente->constancia_afip = $path;

            } else if ($pos2 !== false) {

                //guardo en disco para pdfs
                $path = $afip->storeAs("/documents/contribuyentes",($request->cuit . "_" . $fecha . '.' . $afip->extension()));

                $contribuyente->constancia_afip = $path;
            }
        $contribuyente->save();
        //id del registro que se acaba de cargar
        $id = $contribuyente->id_contribuyente;

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
    public function updateContribuyente(Request $request)
    {
        $params = array();
        parse_str($request->data, $params);



        $fecha=Carbon::createFromFormat('d-m-Y', $params['fecha_actividad_contribuyente'])->toDateTimeString();


        $contribuyente=Contribuyente::find($params['id_contribuyente']);

        $contribuyente->id_localidad=intval($params['id_localidad_administracion']);
        $contribuyente->id_barrio=intval($params['id_barrio_administracion']);
        $contribuyente->id_calle=intval($params['id_calle_administracion']);
        $contribuyente->numero=$params['nro_calle_legal'];
        $contribuyente->piso=$params['nro_piso_legal'];
        $contribuyente->depto=$params['nro_departamento_legal'];
        $contribuyente->referencias_domicilio=$params['referencia_legal'];
        $contribuyente->id_regimen_ib=intval($params['id_regimen_ib']);
        $contribuyente->numero_de_ib=$params['numero_de_ib'];
        $contribuyente->id_condicion_iva=intval($params['id_condicion_iva']);
        $contribuyente->id_naturaleza_juridica=intval($params['id_naturaleza_juridica']);
        $contribuyente->fecha_inicio_de_actividades=$fecha;
        $contribuyente->cod_postal=$params['cod_postal'];
        $contribuyente->id_punto_cardinal=intval($params['zona_administracion']);

        $contribuyente->save();
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
