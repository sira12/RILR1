<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Localidad;
use Illuminate\Support\Facades\DB;

class LocalidadController extends Controller
{
    

    public function store($nom_localidad, $id_provincia)
    {
       $localidadName=strtoupper($nom_localidad); 
        return DB::table('localidad')->insertGetId(
            [
            'localidad'=>$nom_localidad,
            'id_provincia'=>intval($id_provincia),
            'activo'=>'S'
            ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function getLocalidades(Request $request)
    {


            if ($request->search == '') {
                $localidades = Localidad::orderby('barrio', 'asc')->select('id_localidad', 'localidad')->limit(5)->get();

            } else {
                $localidades = localidad::where("localidad", "LIKE", "%{$request->search}%")
                    ->where('activo', 'S')
                    ->where('id_provincia', $request->id_prov)
                    ->get();
            }




        $response = array();
        foreach ($localidades as $localidad) {
            $response[] = array("value" => $localidad->id_localidad, "label" => trim($localidad->localidad));
        }


        return response()->json($response);
    }
}
