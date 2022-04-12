<?php

namespace App\Http\Controllers;

use App\Models\DestinoProvincia;
use App\Models\VentasYFacturacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;


class VentasyFacturacionController extends Controller
{
    //funcion para traer la clasificacion de ventas
    public function getCVentas(Request $request)
    {
        return response()->json(DB::table('clasificacion_ventas')->where('activo', 'S')->get());
    }

    public function getProvinciasVentas()
    {
        return response()->json(DB::table('provincia')->where('id_pais', 1)->where('activo', 'S')->get());
    }

    public function getPaisesVentas()
    {
        return response()->json(DB::table('pais')->where('id_pais', '!=', 1)->where('activo', 'S')->get());
    }

    public function saveVenta(Request $request)
    {

        $params = [];

        parse_str($request->data, $params);
        $id_industria = intval($request->id_industria);
        $status = 200;
        $periodo_fiscal= $request->p_f;
	   



        //nota: si el id de la industria y el de clasificacion y año ya existe entonces no guardar
        $existente = DB::table('destino_ventas')
            ->where('id_industria', $id_industria)
            ->where('id_clasificacion_ventas', $params['clasif_venta'])
            ->where('anio',$periodo_fiscal)
            ->get();


        if (count($existente) > 0) {
            $msg = "La venta ya existe";
            $status = 1;
        } else {

            //guardar datos

            $id = DB::table('destino_ventas')->insertGetId([
                'id_clasificacion_ventas' => intval($params['clasif_venta']),
                'id_industria' => $id_industria,
                'anio' => $periodo_fiscal,
                'fecha_de_actualizacion' => Carbon::now(),
            ]);

            foreach ($params['ventas_provincias'] as $venta) {
                DB::table('rel_destino_ventas_provincia')->insertGetId([
                    'id_destino_ventas' => intval($id),
                    'id_provincia' => intval($venta),
                ]);
            }

            if (isset($params['ventas_paises']) && count($params['ventas_paises']) > 0) {

                foreach ($params['ventas_paises'] as $venta) {
                    DB::table('rel_destino_ventas_pais')->insertGetId([
                        'id_destino_ventas' => intval($id),
                        'id_pais' => intval($venta),
                    ]);
                }
            }

            $msg = "Venta Guardada exitosamente!";
        }

        return response()->json(array('status' => $status, 'msg' => $msg), 200);
    }

    public function updateVenta(Request $request)
    {
        $params = [];

        parse_str($request->data, $params);
        $id_industria = intval($request->id_industria);
        $date = Carbon::now()->format('Y'); //2021
        $status = 200;
        $periodo_fiscal= $request->p_f;




        //nota: si el id de la industria y el de clasificacion y año ya existe entonces no guardar
        $existente = DB::table('destino_ventas')
            ->where('id_industria', $id_industria)
            ->where('id_clasificacion_ventas', $params['clasif_venta'])
            ->where('anio',$periodo_fiscal)
            ->where('id_destino_ventas', '!=', intval($params['id_destino_ventas']))
            ->get();


        if (count($existente) > 0) {
            $msg = "La venta ya existe";
            $status = 1;
        } else {

            //guardar datos

            DB::table('destino_ventas')->where('id_destino_ventas', intval($params['id_destino_ventas']))->update([
                'id_clasificacion_ventas' => intval($params['clasif_venta']),
                'id_industria' => $id_industria,
                //'anio' => $date,
                'fecha_de_actualizacion' => Carbon::now(),
            ]);

            $venta = VentasYFacturacion::find(intval($params['id_destino_ventas']));
            $venta->destinoPais;
            $venta->destinoProvincia;

            $venta = json_decode(json_encode($venta), FALSE);


            if (count($venta->destino_pais) > 0) {
                foreach ($venta->destino_pais as $v) {
                    DB::table('rel_destino_ventas_pais')->where('id_rel_destino_ventas_pais', $v->id_rel_destino_ventas_pais)->delete();
                }
            }

            if (count($venta->destino_provincia) > 0) {
                foreach ($venta->destino_provincia as $v) {
                    DB::table('rel_destino_ventas_provincia')->where('id_rel_destino_ventas_provincia', $v->id_rel_destino_ventas_provincia)->delete();
                }
            }

            if (isset($params['ventas_paises']) && count($params['ventas_paises']) > 0) {

                foreach ($params['ventas_paises'] as $val) {
                    DB::table('rel_destino_ventas_pais')->insertGetId([
                        'id_destino_ventas' => intval($params['id_destino_ventas']),
                        'id_pais' => intval($val),
                    ]);
                }
            }

            foreach ($params['ventas_provincias'] as $val) {
                DB::table('rel_destino_ventas_provincia')->insertGetId([
                    'id_destino_ventas' => intval($params['id_destino_ventas']),
                    'id_provincia' => intval($val),
                ]);
            }


            $msg = "Venta Guardada exitosamente!";
        }

        return response()->json(array('status' => $status, 'msg' => $msg), 200);
    }

    public function listVentas(Request $request)
    {



        if ($request->ajax()) {

            //traer dependiendo el periodo fiscal 
            $periodo_fiscal= $request->p_f;
            
        
            
            $data = DB::table('destino_ventas')
                ->join('clasificacion_ventas', 'destino_ventas.id_clasificacion_ventas', 'clasificacion_ventas.id_clasificacion_ventas')
                ->where('id_industria', $request->id_industria)
                ->where('anio',$periodo_fiscal)
                ->select([
                    'destino_ventas.*',
                    'clasificacion_ventas.clasificacion_ventas'
                ])
                ->get();

                
            foreach($data as $d){
               
                $provincias=DB::table('rel_destino_ventas_provincia')
                ->join('provincia', 'rel_destino_ventas_provincia.id_provincia', 'provincia.id_provincia')
                ->where('id_destino_ventas', $d->id_destino_ventas)
                ->select([
                    'rel_destino_ventas_provincia.*',
                    'provincia.provincia'

                ])
                ->get();

                $paises=DB::table('rel_destino_ventas_pais')
                ->join('pais', 'rel_destino_ventas_pais.id_pais', 'pais.id_pais')
                ->where('id_destino_ventas', $d->id_destino_ventas)
                ->select([
                    'rel_destino_ventas_pais.*',
                    'pais.pais'

                ])
                ->get();
                $d->paises=$paises; 
                $d->provincias=$provincias; 
            }
            

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $actionBtn = '<span style="cursor: pointer;" data-placement="left" title="Ver Venta" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalVenta" data-backdrop="static" data-keyboard="false" onClick="VerVenta(' . $row->id_destino_ventas . ')"><i class="mdi mdi-eye font-22 text-danger"></i></span>

                    <span style="cursor: pointer;" data-placement="left" title="Actualizar Venta" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalVenta" data-backdrop="static" data-keyboard="false" onClick="UpdateVenta(' . $row->id_destino_ventas . ')"><i class="mdi mdi-table-edit font-22 text-danger"></i></span>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function getVenta(Request $request)
    {

        $venta = VentasYFacturacion::find(intval($request->id));
        $venta->destinoProvincia;

        $venta->destinoPais;
        return response()->json($venta);
    }


    public function listFact(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('facturacion')
                ->join('categoria_ingresos', 'facturacion.id_categoria_ingresos', 'categoria_ingresos.id_categoria_ingreso')
                ->where('id_industria', $request->id_industria)
                ->where('anio',$request->p_f)
                ->select([
                    'facturacion.*',
                    'categoria_ingresos.categoria'

                ])
                ->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $actionBtn = '

                    <span style="cursor: pointer;" data-placement="left" title="Actualizar Facturación" data-original-title="" data-href="#" data-toggle="modal" data-target="#MyModalFacturacion" data-backdrop="static" data-keyboard="false" onClick="UpdateFacturacion(' . $row->id_facturacion . ');"><i class="mdi mdi-table-edit font-22 text-danger"></i></span>

                    <span style="cursor: pointer;" title="Eliminar Facturación" onClick="EliminarFacturacion(' . $row->id_facturacion . ')"><i class="mdi mdi-delete font-22 text-danger"></i></span>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function getFac(Request $request)
    {

        $f = DB::table('facturacion')->join('categoria_ingresos', 'facturacion.id_categoria_ingresos', 'categoria_ingresos.id_categoria_ingreso')
            ->where('id_facturacion', $request->id)
            ->get();

        return response()->json($f);
    }




    public function ClasifIngresos()
    {
        return response()->json(DB::table('categoria_ingresos')->where('activo', 'S')->get());
    }


    public function saveFacturacion(Request $request)
    {


        $params = [];

        parse_str($request->data, $params);
        $id_industria = intval($request->id_industria);
        
        $status = 200;
        $periodo_fiscal= $request->p_f;

     

        $existente = DB::table('facturacion')
            ->where('id_industria', $id_industria)
            ->where('anio',$periodo_fiscal)
            ->get();

        if (count($existente) > 0) {
            $msg = "La industria ya tiene cargada una clasificacion ";
            $status = 1;
        } else {
            

            DB::table('facturacion')->insertGetId([
                'id_industria' => $id_industria,
                'id_categoria_ingresos' => intval($params['categoria_ingresos']),
                'prevision_ingresos_anio_corriente' => $params['prevision_ingresos_anio_corriente'],
                'prevision_ingresos_anio_corriente_dolares' => $params['prevision_ingresos_anio_corriente_dolares'],
                'porcentaje_prevision_mercado_interno' => $params['porcentaje_prevision_mercado_interno'],
                'porcentaje_prevision_mercado_externo' => $params['porcentaje_prevision_mercado_externo'],
                'anio' => $periodo_fiscal,
                'fecha_de_actualizacion' => Carbon::now(),

            ]);

            $msg = "Guardado Exitosamente!";
        }


        return response()->json(array('status' => $status, 'msg' => $msg), 200);
    }

    public function updateFacturacion(Request $request)
    {
        $params = [];
        $periodo_fiscal= $request->p_f;

        parse_str($request->data, $params);
        $id_industria = intval($request->id_industria);
     
        $status = 200;

      


       if( DB::table('facturacion')->where('id_facturacion', intval($params['id_facturacion']))->Update([
            'id_industria' => $id_industria,
            'id_categoria_ingresos' => intval($params['categoria_ingresos']),
            'prevision_ingresos_anio_corriente' => $params['prevision_ingresos_anio_corriente'],
            'prevision_ingresos_anio_corriente_dolares' =>$params['prevision_ingresos_anio_corriente_dolares'],
            'porcentaje_prevision_mercado_interno' => $params['porcentaje_prevision_mercado_interno'],
            'porcentaje_prevision_mercado_externo' => $params['porcentaje_prevision_mercado_externo'],
            /* 'anio'=>$date, */
            'fecha_de_actualizacion' => Carbon::now(),

        ])){
            $msg = "Guardado Exitosamente!";
        }else{
            $msg = "Error";
        }

      
    


        return response()->json(array('status' => $status, 'msg' => $msg), 200);
    }

    public function deleteFac(Request $request)
    {

        if (DB::table('facturacion')->where('id_facturacion', intval($request->id))->delete()) {
            return response()->json(array('status' => 200, 'msg' => "ok"), 200);
        }
    }
}
