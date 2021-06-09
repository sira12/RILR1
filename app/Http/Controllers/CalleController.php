<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calle;

class CalleController extends Controller
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
        $calle=new Calle();

        $nombre=strtoupper($request->search_calle);

        $calle->calle=$nombre;
        $calle->activo="P";
        $calle->id_localidad=$request->id_localidad;
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
