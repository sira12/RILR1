<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MateriaPrimaController extends Controller
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
     * @return int
     */
    public function store(Request $request)
    {
        $params=[];
        parse_str($request->data,$params);


        $id = DB::table('materia_prima')->insertGetId([
            'materia_prima'=>$params['search_materia'],
            'activo'=>'S'
        ]);

        return $id;
    }

    public function getMateriaPrima(Request $request){

          if($request->search == ''){
            $materias=DB::table('materia_prima')->select('id_materia_prima','materia_prima')->limit(5)->get();

        }else{
            $materias=DB::table('materia_prima')->where("materia_prima", "LIKE", "%{$request->search}%")
            ->where('activo','S')
            ->get();
        }


        $response = array();
        foreach($materias as $materia){
           $response[] = array("value"=>$materia->id_materia_prima,"label"=>trim($materia->materia_prima));
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
