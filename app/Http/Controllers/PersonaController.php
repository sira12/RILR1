<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use Carbon\Carbon;

class PersonaController extends Controller
{
    

    

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
        $persona->id_localidad = intval($localidad);
        $persona->id_barrio = intval($barrio);
        $persona->id_calle = intval($calle);
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

        if($persona->save()){

        //id del registro que se acaba de cargar
        return $persona->id_persona;  
        
        }else{

            return "error";
        }    
    }
}
