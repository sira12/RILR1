<?php

namespace App\Http\Controllers;
use App\Models\Provincia;
use Illuminate\Http\Request;

class ProvinciaController extends Controller
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
        //
    }
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function getProvincias(Request $request)
    {
        if($request->search == ''){
            $provincias=Provincia::orderby('barrio','asc')->select('id_provincia','provincia')->limit(5)->get();

        }else{

            if($request->id_pais){
                 $provincias=Provincia::where("provincia", "LIKE", "%{$request->search}%")
                     ->where('id_pais',intval($request->id_pais))
                     ->where('activo','S')
                ->get();
            }else{
                $provincias=Provincia::where("provincia", "LIKE", "%{$request->search}%")
                ->where('activo','S')
                ->get();
            }

        }


        $response = array();
        foreach($provincias as $provincia){
           $response[] = array("value"=>$provincia->id_provincia,"label"=>trim($provincia->provincia));
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
