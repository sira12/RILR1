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
        $contribuyente->id_localidad = $request->id_localidad;
        $contribuyente->id_barrio = $request->id_barrio;
        $contribuyente->id_calle = $request->id_calle;
        $contribuyente->numero = $request->nro_calle;
        $contribuyente->piso = $request->nro_piso;
        $contribuyente->depto = $request->nro_departamento;
        $contribuyente->referencias_domicilio = $request->referencia;
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
