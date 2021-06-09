<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

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


     //asigna el producto a la actividad
     public function saveAsignacionProducto(Request $request)
     {
         $params = [];
         parse_str($request->data, $params);
 
 
         $date = Carbon::now()->format('Y');
 
         $status = 200;
 
         if ($params['id_producto'] == "") {
             $producto = new ProductoController();
             $id_producto = $producto->store($request);
         } else {
             $id_producto = intval($params['id_producto']);
         }
 
         //comprobaciones
         $prod_existente = DB::table('rel_actividad_producto')
             ->where('id_rel_industria_actividad', intval($params['id_rel_industria_actividad']))
             ->where('id_producto', $id_producto)
             ->get();
 
 
         if (count($prod_existente) > 0) {
             $msg = "¡Este producto ya se encuentra cargado!";
             $status = 1;
         } else {
             $id_rel_producto_actividad = DB::table('rel_actividad_producto')->insertGetId([
                 'id_rel_industria_actividad' => intval($params['id_rel_industria_actividad']),
                 'id_producto' => $id_producto,
                 'id_unidad_de_medida' => intval($params['medida_producto']),
                 'cantidad_producida' => intval($params['cantidad_producida']),
                 'porcentaje_sobre_produccion' => intval($params['porcentaje_sobre_produccion']),
                 'ventas_en_provincia' => intval($params['ventas_en_provincia']),
                 'ventas_en_otras_provincias' => intval($params['ventas_en_otras_provincias']),
                 'ventas_internacionales' => intval($params['ventas_internacionales']),
                 'anio' => $date,
                 'fecha_de_actualizacion' => Carbon::now(),
             ]);
 
             $msg = "¡Datos Guardados exitosamente!";
 
 
         }
 
 
         return response()->json(array('status' => $status, 'msg' => $msg), 200);
 
     }
 
     
 
     //actualiza el producto y la relacion con la actividad
     public function updateRelActProd(Request $request)
     {
 
 
         $params = [];
 
         parse_str($request->data, $params);
 
 
        // $date = Carbon::now()->format('Y');
         $status = 200;
 
 
         $id_producto_actual = intval($params['id_producto']);
 
         //comprobaciones
         $prod_existente = DB::table('rel_actividad_producto')
             ->where('id_rel_industria_actividad', intval($params['id_rel_industria_actividad']))
             ->where('id_producto', $id_producto_actual)
             ->where('id_rel_actividad_producto', '!=', intval($params['id_rel_actividad_productos']))
             ->get();
 
         //si escribio mal el nombre y quiere editarlo pero el nombre coincide con el de otro
          
         $productos_nombre_iguales = DB::table('producto')->where('producto', $params['search_producto'])
             ->where('id_producto','!=',  $id_producto_actual )
             ->get();
 
         if (count($productos_nombre_iguales) >= 1) {
 
             /*$id_prod_igual = $productos_iguales[0]->id_producto;
             $id_prod_viejo= $id_producto_actual;
             $id_producto_actual=$id_prod_igual;*/
 
             $msg = "¡Ya existe un producto con el mismo nombre!";
             $status = 1;
 
 
         } else if (count($prod_existente) > 0) {
             $msg = "¡Este producto ya se encuentra cargado!";
             $status = 1;
         } else {

            
            //comprobacion si el prod esta siendo utilizado
            
            $prod_utilizado = DB::table('rel_actividad_producto')
            ->where('id_rel_industria_actividad','!=', intval($params['id_rel_industria_actividad']))
            ->where('id_producto', $id_producto_actual)
            ->where('id_rel_actividad_producto', '!=', intval($params['id_rel_actividad_productos']))
            ->get();

            if(count($prod_utilizado) < 1){
            //si el producto no est'a siendo utilizado lo edito
                $producto = new ProductoController();
                $id_producto = $producto->update($request,$id_producto_actual);
            }else{
                //tengo que cargar uno nuevo
                $producto = new ProductoController();
                $id_producto = $producto->store($request);
            }
          
 
             $id_rel_producto_actividad = DB::table('rel_actividad_producto')
                 ->where('id_rel_actividad_producto', intval($params['id_rel_actividad_productos']))
                 ->update([
                     'id_rel_industria_actividad' => intval($params['id_rel_industria_actividad']),
                     'id_producto' => $id_producto,
                     'id_unidad_de_medida' => intval($params['medida_producto']),
                     'cantidad_producida' => intval($params['cantidad_producida']),
                     'porcentaje_sobre_produccion' => intval($params['porcentaje_sobre_produccion']),
                     'ventas_en_provincia' => intval($params['ventas_en_provincia']),
                     'ventas_en_otras_provincias' => intval($params['ventas_en_otras_provincias']),
                     'ventas_internacionales' => intval($params['ventas_internacionales']),
                     'anio' => intval($params['anio_producto']),
                     'fecha_de_actualizacion' => Carbon::now(),
                 ]);
 
             /*if (isset($id_prod_igual)) {
                 DB::table('producto')->where('id_producto', $id_prod_viejo)->delete();
             }*/
 
             $msg = "¡Datos Actualizados exitosamente!";
 
 
         }
 
 
         return response()->json(array('status' => $status, 'msg' => $msg), 200);
 
     }


        //elminar productos asignado a la actividad
    public function eliminarProductoAsignado(Request $request)
    {

        if (DB::table('rel_actividad_producto')->where('id_rel_actividad_producto', intval($request->id_rel_act_producto))->delete()) {
            return response()->json(array('status' => 200), 200);
        }

    }

     //saca datos de un producto especifico
     public function getDatosProducto(Request $request)
     {
 
         $response = DB::table('rel_actividad_producto')->where('id_rel_actividad_producto', intval($request->id_producto))
             ->join('producto', 'rel_actividad_producto.id_producto', '=', 'producto.id_producto')
             ->select(
                 'rel_actividad_producto.*',
                 'producto.producto as nomproducto'
             )
             ->get();
         return response()->json($response);
     }

     //listar productos modal
    public function listRelActProd(Request $request)
    {

        if ($request->ajax()) {
            $data = DB::table('rel_actividad_producto')
                ->join('producto', 'rel_actividad_producto.id_producto', '=', 'producto.id_producto')
                ->join('unidad_de_medida', 'rel_actividad_producto.id_unidad_de_medida', '=', 'unidad_de_medida.id_unidad_de_medida')

                ->where('id_rel_industria_actividad', intval($request->id_asignacion_producto)) //es el id_rel_industira_actividad
                ->select(
                    'rel_actividad_producto.*',
                    'producto.producto as nombre_producto',
                    'unidad_de_medida.unidad_de_medida',
                )
                ->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $actionBtn = '<span style="cursor: pointer;" data-placement="left" title="Actualizar Producto" onclick="Update_Producto(' . $row->id_rel_actividad_producto . ')"><i class="mdi mdi-table-edit font-22 text-danger"></i></span>
                                    <span style="cursor: pointer;" onclick="EliminarProductoAsignado(' . $row->id_rel_actividad_producto . ')" title="Eliminar Producto"><i class="mdi mdi-delete font-24 text-danger"></i></span>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
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
