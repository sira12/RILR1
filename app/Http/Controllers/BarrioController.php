<?php

namespace App\Http\Controllers;

use App\Models\Barrio;
use Illuminate\Http\Request;

class BarrioController extends Controller
{
  

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$localidad)
    {   

        $barrio=new Barrio();

        $nombre=strtoupper($request->search_barrio);

        $barrio->barrio=$nombre;
        $barrio->activo="P";
        $barrio->id_localidad=(int)$localidad;
        $barrio->save(); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getBarrios(Request $request)
    {
      
        
        if($request->search == ''){
            $barrios=Barrio::orderby('barrio','asc')->select('id_barrio','barrio')->limit(5)->get();

        }else{
            $barrios=Barrio::where("barrio", "LIKE", "%{$request->search}%")
            ->where('activo','S')
            ->where('id_localidad',$request->id_loc)
            ->get();
        }
        

        //return view('NOMBRE_VISTA')->with('buscar', $noticias);

        $response = array();
        foreach($barrios as $barrio){
           $response[] = array("value"=>$barrio->id_barrio,"label"=>trim($barrio->barrio));
        }
  
        return response()->json($response);
       
    }    

}
