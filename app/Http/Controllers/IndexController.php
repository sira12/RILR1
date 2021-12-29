<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Industria;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\User;
class IndexController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();


        $pers_contrib = DB::table('rel_persona_contribuyente')->where('id_rel_persona_contribuyente', $user->id_rel_persona_contribuyente)->first();
        $contribuyente=DB::table('contribuyente')->where('id_contribuyente',$pers_contrib->id_contribuyente)->get();

        $industrias = Industria::where('industria.id_contribuyente', '=', $pers_contrib->id_contribuyente)->get();
        foreach ($industrias as $industria) {
            $act = $industria->actividades;
            $industria['actividad'] = $act;
        }


        return view('index', [
            'industrias' => $industrias,
            'id_contribuyente' => $pers_contrib->id_contribuyente,
            'contribuyente'=>$contribuyente[0]
        ]);
    }

    public function indexOperador(){

        $user = auth()->user();

        $persona=DB::table('rel_persona_contribuyente')
            ->where('id_rel_persona_contribuyente',$user['id_rel_persona_contribuyente'])
            ->join('persona','rel_persona_contribuyente.id_persona','persona.id_persona')
            ->select([
                'persona.*'
            ])
            ->get();


        return view('index-admin',[
            'usuario'=>$user,
            'persona'=>$persona
        ]);
    }


    public function getSolicitudes(Request $request){


        $AuthController = new User();
        $user=$AuthController->GetinfoUser();

        if ($request->ajax()) {
            $data =DB::table('rel_persona_contribuyente')
            ->join('contribuyente','rel_persona_contribuyente.id_contribuyente','contribuyente.id_contribuyente')
            ->join('persona','rel_persona_contribuyente.id_persona','persona.id_persona')
            ->join('usuario','rel_persona_contribuyente.id_rel_persona_contribuyente','usuario.id_rel_persona_contribuyente')
            ->select(
                'rel_persona_contribuyente.id_rel_persona_contribuyente as id_rel_persona_contribuyente_rpc',
                'rel_persona_contribuyente.id_tipo_de_afectacion as id_tipo_de_afectacion_rpc',
                'rel_persona_contribuyente.fecha_inicio as fecha_inicio_rpc',
                'rel_persona_contribuyente.fecha_fin as fecha_fin_rpc',
                'rel_persona_contribuyente.documento_vinculante as documento_vinculante_rpc',
                'rel_persona_contribuyente.documento_poder as documento_poder_rpc',
                'rel_persona_contribuyente.autorizado as autorizado_rpc',
                'rel_persona_contribuyente.fecha_de_actualizacion as fecha_de_actualizacion_rpc',


                'contribuyente.id_contribuyente as id_cbt',
                'contribuyente.cuit as cuit_cbt',
                'contribuyente.numero_de_ib as numero_de_ib_cbt',
                'contribuyente.razon_social as razon_social_cbt',
                'contribuyente.id_condicion_iva as id_condicion_iva_cbt',
                'contribuyente.id_naturaleza_juridica as id_naturaleza_juridica_cbt',
                'contribuyente.id_persona_juridica as id_persona_juridica_cbt',
                'contribuyente.id_localidad as id_localidad_cbt',
                'contribuyente.id_barrio as id_barrio_cbt',
                'contribuyente.id_calle as id_calle_cbt',
                'contribuyente.numero as numero_cbt',
                'contribuyente.piso as piso_cbt',
                'contribuyente.depto as depto_cbt',
                'contribuyente.id_punto_cardinal as id_punto_cardinal_cbt',
                'contribuyente.referencias_domicilio as referencias_domicilio_cbt',
                'contribuyente.tel_fijo as tel_fijo_cbt',
                'contribuyente.fecha_inicio_de_actividades as fecha_inicio_de_actividades_cbt',
                'contribuyente.cod_postal as cod_postal_cbt',
                'contribuyente.constancia_afip as constancia_afip_cbt',
                'contribuyente.activo as activo_cbt',
                'contribuyente.email_fiscal as email_fiscal_cbt',

                'persona.id_persona as id_persona',
                'persona.documento as documento_psna',
                'persona.id_tipo_de_documento as id_tipo_de_documento_psna',
                'persona.nombre as nombre_psna',
                'persona.id_localidad as id_localidad_psna',
                'persona.id_barrio as id_barrio_psna',
                'persona.id_calle as id_calle_psna',
                'persona.numero as numero_psna',
                'persona.id_punto_cardinal as id_punto_cardinal_psna',
                'persona.piso as piso_psna',
                'persona.depto as depto_psna',
                'persona.referencias_domicilio as referencias_domicilio_psna',
                'persona.tel_fijo as tel_fijo_psna',
                'persona.tel_celular as tel_celular_psna',
                'persona.id_sexo as id_sexo_psna',
                'persona.fecha_de_nacimiento as fecha_de_nacimiento_psna',
                'persona.id_pais as id_pais_psna',
                'persona.frente_dni as frente_dni_psna',
                'persona.dorso_dni as dorso_dni_psna',
                'persona.vive as vive_psna',
                'persona.fecha_de_alta as fecha_de_alta_psna',
                'persona.activo as activo_psna',

                'usuario.id_usuario as id_usuario_usr'
            )
            ->where('rel_persona_contribuyente.autorizado','P')->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $actionBtn = '<span style="cursor: pointer;" data-placement="left" title="Verificar Solicitud" data-original-title="" data-href="#" data-toggle="modal" data-target="#myModalSolicitud" data-backdrop="static" data-keyboard="false" onclick="VerificarSolicitud(\''.$row->id_rel_persona_contribuyente_rpc.'\',\''.$row->cuit_cbt.'\',\''.$row->razon_social_cbt.'\',\''.$row->documento_psna.'\',\''.$row->email_fiscal_cbt.'\',\''.$row->fecha_de_actualizacion_rpc.'\',\''.$row->tel_celular_psna.'\',\''.$row->nombre_psna.'\',\''.$row->id_persona.'\',\''.$row->id_usuario_usr.'\',\''.$row->id_cbt.'\',\''.$row->frente_dni_psna.'\',\''.$row->dorso_dni_psna.'\',\''.$row->constancia_afip_cbt.'\',\''.$row->documento_vinculante_rpc.'\',\''.$row->documento_poder_rpc.'\')"><i class="mdi mdi-recycle font-22 text-danger"></i></span>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }





    }



}
