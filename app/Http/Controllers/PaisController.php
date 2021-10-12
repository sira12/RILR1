<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaisController extends Controller
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
    public function store($nom_pais)
    {
       return DB::table('pais')->insertGetId(['pais'=>$nom_pais, 'activo'=>'S']); 
    }

    public function getpais(Request $request){

        if($request->search == ''){
            $paises=DB::table('pais')->select('id_pais','pais')->limit(5)->get();

        }else{
            $paises=DB::table('pais')->where("pais", "LIKE", "%{$request->search}%")
            ->where('activo','S')
            ->get();
        }


        $response = array();
        foreach($paises as $pais){
           $response[] = array("value"=>$pais->id_pais,"label"=>trim($pais->pais));
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
