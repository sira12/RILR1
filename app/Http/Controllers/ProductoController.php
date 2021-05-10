<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
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

         $params=[];
         parse_str($request->data,$params);

        //comprobar si el producto existe; si existe se devuelve id del producto
        $result=Producto::where('producto',$params['search_producto'])->get();

        if(count($result) >= 1){
            //devulvo id
            $response=$result[0]['id_producto'];
        }else{
            //si no existe guardarlo
            $producto= new Producto();

            $producto->producto=$params['search_producto'];
            $producto->activo="S";

            $producto->save();
            //devuelvo id
            $response=$producto->id_producto;
        }

        return $response;
    }


    public function busqueda_producto(Request $request){

         if($request->search == ''){
            $productos=Producto::orderby('producto','asc')->select('id_producto','producto')->limit(5)->get();

        }else{
            $productos=Producto::where("producto", "LIKE", "%{$request->search}%")
            ->where('activo','S')
            ->get();
        }


        $response = array();
        foreach($productos as $producto){
           $response[] = array("value"=>$producto->id_producto,"label"=>trim($producto->producto));
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
        $params=[];
        parse_str($request->data,$params);

        $producto=Producto::find($id);

        $producto->producto=$params['search_producto'];

        if($producto->save()){
            return $producto->id_producto;
        }
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
