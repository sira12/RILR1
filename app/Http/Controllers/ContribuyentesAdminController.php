<?php

namespace App\Http\Controllers;

use App\Models\Industria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ContribuyentesAdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = auth()->user();

        $persona=DB::table('rel_persona_contribuyente')
            ->where('id_rel_persona_contribuyente',$user['id_rel_persona_contribuyente'])
            ->join('persona','rel_persona_contribuyente.id_persona','persona.id_persona')
            ->select([
                'persona.*'
            ])
            ->get();



        $contribuyentes = DB::table('contribuyente')
            ->join('rel_persona_contribuyente', 'contribuyente.id_contribuyente', 'rel_persona_contribuyente.id_contribuyente')
            ->join('persona', 'rel_persona_contribuyente.id_persona', 'persona.id_persona')
            ->select(
                'contribuyente.*',
                'persona.nombre as nombrePersona',
                'persona.documento as dniPersona'
            )
            ->get();

        return view('PanelAdmin.ListadoContribuyentes', [
            'usuario' => $user,
            'persona' => $persona
        ]);
    }



    public function getContribuyentesAdmin(Request $request)
    {

        $contribuyentes = DB::table('contribuyente')
            ->join('rel_persona_contribuyente', 'contribuyente.id_contribuyente', 'rel_persona_contribuyente.id_contribuyente')
            ->join('persona', 'rel_persona_contribuyente.id_persona', 'persona.id_persona')
            ->select(
                'contribuyente.*',
                'persona.nombre as nombrePersona',
                'persona.documento as dniPersona',
            )
            ->get();

              foreach($contribuyentes as $cbt){

                    $inds=DB::table('industria')->where('id_contribuyente',$cbt->id_contribuyente)->select('industria.nombre_de_fantasia')->get();
                    $name="";
                    $length=count($inds);

                    foreach($inds as $index=>$ind){
                        $name.=$ind->nombre_de_fantasia;

                        if($index < $length && $index+1 <$length){
                            $name.=", ";
                        }


                    }



                $cbt->industrias= $name;
              }


        return DataTables::of($contribuyentes)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {

                $actionBtn = '<span style="cursor: pointer;" data-placement="left" title="Ver Industrias" data-original-title="" data-href="#" data-toggle="modal" data-target="#myModalVerCbt" data-backdrop="static" data-keyboard="false" onclick="VerCbt('.$row->id_contribuyente.')"><i class="mdi mdi-eye font-22 text-danger"></i></span>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function getIndustrias(Request $request)
    {
        $industrias = Industria::where('industria.id_contribuyente', '=', $request->id)->get();


        return DataTables::of($industrias)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {

                $actionBtn = '<span style="cursor: pointer;" data-placement="left" title="Verificar Solicitud" data-original-title="" data-href="#" data-toggle="modal" data-target="#myModalVerInd" data-backdrop="static" data-keyboard="false" onclick="VerDatosInd(' . $row->id_industria . ')"><i class="mdi mdi-eye font-22 text-danger"></i></span>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    public function verInd(Request $request)
    {


        $id = $request->id;
        $result = [];
        $result['industria_contribuyente'] = DB::select("select * from vw_info_contribuyente_industria where id_industria =" . $id);
        $result['servicios'] = DB::select("select * from vw_info_servicio where id_industria =" . $id);
        $result['insumos'] = DB::select("select * from vw_info_insumo where id_industria =" . $id);
        $result['certificados'] = DB::select("select * from vw_info_certificado where id_industria =" . $id);
        $result['sistemas'] = DB::select('select * from vw_info_sistema_de_calidad where id_industria =' . $id);
        $result['act_prod'] = DB::select('select * from vw_info_actividad_producto where id_industria =' . $id);
        $result['act_mat'] = DB::select('select * from vw_info_actividad_materia_prima where id_industria =' . $id);
        $result['sit'] = DB::select('select * from vw_info_situacion_de_planta where id_industria =' . $id);
        $result['ocios'] = DB::select('select * from vw_info_motivo_ociosidad where id_industria =' . $id);
        $result['po'] = DB::select('select * from vw_info_industria_personal_ocupado where id_industria =' . $id);
        $result['venta_nacional'] = DB::select('select * from vw_info_ventas_nacionales where id_industria =' . $id);
        $result['venta_inter'] = DB::select('select * from vw_info_ventas_exterior where id_industria =' . $id);
        $result['fact'] = DB::select('select * from vw_info_facturacion where id_industria =' . $id);
        $result['efluente'] = DB::select('select * from vw_info_efluente where id_industria =' . $id);
        $result['gastos'] = DB::select('select * from vw_info_egreso where id_industria =' . $id);
        $result['promo'] = DB::select('select * from vw_info_promocion_industrial where id_industria =' . $id);
        $result['eco'] = DB::select('select * from vw_info_economia_del_conocimiento_sector where id_industria =' . $id);
        $result['perfil'] = DB::select('select * from vw_info_economia_del_conocimiento_perfil where id_industria =' . $id);


        return response()->json($result);
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
