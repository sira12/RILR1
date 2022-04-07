<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calle;

class CalleController extends Controller
{



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$localidad)
    {
        $calle=new Calle();

        $nombre=strtoupper($request->search_calle);

        $calle->calle=$nombre;
        $calle->activo="P";
        $calle->id_localidad=(int)$localidad;
        $calle->save();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getCalles(Request $request)
    {
        if($request->search == ''){
            $calles=Calle::orderby('calle','asc')->select('id_calle','calle')->limit(5)->get();

        }else{

            $calles=Calle::where("calle", "LIKE", "%{$request->search}%")
            ->where('activo','S')
            ->where("id_localidad",$request->id_loc)
            ->get();
        }


        //return view('NOMBRE_VISTA')->with('buscar', $noticias);

        $response = array();
        foreach($calles as $calle){
           $response[] = array("value"=>$calle->id_calle,"label"=>trim($calle->calle));
        }

        return response()->json($response);
    }
}
