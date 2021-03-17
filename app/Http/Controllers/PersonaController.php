<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use Carbon\Carbon;
class PersonaController extends Controller
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
        

        $persona= new Persona();

        $persona->documento=$request->documento;
        $persona->id_tipo_de_documento=$request->id_tipo_de_documento;
        $persona->nombre=$request->nombre; 
        $persona->id_localidad=$request->id_localidad; 
        $persona->id_barrio=$request->id_barrio; 
        $persona->id_calle=$request->id_calle; 
        $persona->numero=$request->nro_calle; 
        $persona->piso=$request->nro_piso; 
        $persona->depto=$request->nro_departamento; 
        $persona->referencias_domicilio=$request->referencia; 
        $persona->tel_celular=$request->celular; 
        $persona->email=$request->email_fiscal; 
        $persona->fecha_de_actualizacion=Carbon::now(); 

        $persona->save();
        //id del registro que se acaba de cargar 
        $id=$persona->id_persona;
         
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
