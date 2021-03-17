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


        $contribuyente= new Contribuyente();

        $contribuyente->cuit=intval($request->cuit);
        $contribuyente->razon_social=$request->razonsocial;
        $contribuyente->id_localidad=$request->id_localidad; 
        $contribuyente->id_barrio=$request->id_barrio; 
        $contribuyente->id_calle=$request->id_calle; 
        $contribuyente->numero=$request->nro_calle; 
        $contribuyente->piso=$request->nro_piso; 
        $contribuyente->depto=$request->nro_departamento; 
        $contribuyente->referencias_domicilio=$request->referencia; 
        $contribuyente->email_fiscal=$request->email_fiscal; 
        $contribuyente->fecha_de_actualizacion=Carbon::now(); 
        $contribuyente->activo="P"; 
        

        $contribuyente->save();
        //id del registro que se acaba de cargar 
        $id=$contribuyente->id_contribuyente;
         
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
