<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use function PHPUnit\Framework\countOf;

class UsuariosAdminController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('PanelAdmin.Usuarios');
    }


    public function getUsuarios(Request $request){

        if ($request->ajax()) {
            $data =DB::table('usuario')
            ->leftjoin('rel_persona_contribuyente','usuario.id_rel_persona_contribuyente','rel_persona_contribuyente.id_rel_persona_contribuyente')
            ->leftjoin('persona','rel_persona_contribuyente.id_persona','persona.id_persona')
            ->select(
                "usuario.*",
                "persona.*"
            )
            ->get();
            $datatmp=array();
            foreach($data as $user){
                $us=new \App\Http\Controllers\User();
                $rolename=$us->roleNames($user->id_usuario);
                $user->rolenames=$rolename;

                if(str_contains($rolename, 'ADMINISTRADOR')){
                    array_push($datatmp,$user);
                }
            }



            return DataTables::of($datatmp)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $actionBtn = '<span data-toggle="modal" data-target="#myModalUserUpdate" style="cursor: pointer;" data-placement="left" title="Actualizar Usuario" onclick="UpdateUser(\''.$row->documento.'\',\''.$row->nombre.'\',\''.$row->tel_fijo.'\',\''.$row->tel_celular.'\',\''.$row->email.'\',\''.$row->activo.'\',\''.$row->rolenames.'\',\''.$row->id_usuario.'\',\''.$row->id_persona.'\',\''.$row->id_rel_persona_contribuyente.'\');"><i class="mdi mdi-table-edit font-22 text-danger"></i></span>
                                     <span  data-toggle="modal" data-target="#myModalUserUpdatePassword" style="cursor: pointer;" onclick="ChangePassword('.$row->id_usuario.')" title="Cambiar Contraseña"><i class="mdi mdi-key font-24 text-danger"></i></span>
                                    <span style="cursor: pointer;" onclick="DeleteUser()" title="Eliminar Usuario"><i class="mdi mdi-delete font-24 text-danger"></i></span>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function storeUser(Request $request)
    {
        $params = array();
        parse_str($request->data, $params);
        $DateTime = \Carbon\Carbon::now();

        $userDuplicado=DB::table('usuario')->where('email',$params['email'])->get();

        if(count($userDuplicado)> 0){
            return response()->json(array('status' => 1, 'msg' => "Ya existe un usuario con este mail, por favor ingrese uno distinto."), 200);
        }

        $activo=$params['status']=="1"? "S" : "N";

        $personaId=DB::table('persona')->insertGetId([
           'documento' =>$params['dni'],
            'nombre'=>$params['nombres'],
            'tel_celular'=>$params['celular'],
            'tel_fijo'=>$params['telefono'],
            'id_tipo_de_documento'=>7,
            'vive'=>"S",
            'activo'=>$activo,
            'fecha_de_actualizacion'=>$DateTime
        ]);

        $relPC=DB::table('rel_persona_contribuyente')->insertGetId([
            'id_persona'=>$personaId,
            'autorizado'=>$activo,
            'fecha_de_actualizacion'=>$DateTime
        ]);

        $user = DB::table('usuario')->insertGetId([
            'usuario' => $params['nombres'],
            'id_rel_persona_contribuyente'=>$relPC,
            'email' => $params['email'],
            'password' => Hash::make($params['password2']),
            'autorizado' => $activo,
            'fecha_alta' => $DateTime,
            'activo' => $activo,
            'fecha_de_actualizacion' => $DateTime
        ]);

        DB::table('user_role')->insertGetId([
            'id_user'=>$user,
            'id_role'=>1
        ]);

        return response()->json(array('status' => 200, 'msg' => "Usuario Creado Correctamente"), 200);
    }


    public function update(Request $request)
    {
        $params = array();
        parse_str($request->data, $params);
        $DateTime = \Carbon\Carbon::now();

        $userDuplicado=DB::table('usuario')
            ->where('email',$params['emailUpdate'])
            ->where('id_usuario','!=',intval($params['id_usuario']))->get();

        if(count($userDuplicado)> 0){
            return response()->json(array('status' => 1, 'msg' => "Ya existe un usuario con este mail, por favor ingrese uno distinto."), 200);
        }

        $activo=$params['statusUpdate']=="1"? "S" : "N";

        DB::table('persona')->where('id_persona',intval($params['id_persona']))->Update([
            'documento' =>$params['dniUpdate'],
            'nombre'=>$params['nombresUpdate'],
            'tel_celular'=>$params['celularUpdate'],
            'tel_fijo'=>$params['telefonoUpdate'],
            'id_tipo_de_documento'=>7,
            'vive'=>"S",
            'activo'=>$activo,
            'fecha_de_actualizacion'=>$DateTime
        ]);

        DB::table('rel_persona_contribuyente')->where('id_rel_persona_contribuyente',intval($params['id_pc']))->update([
            'autorizado'=>$activo,
            'fecha_de_actualizacion'=>$DateTime
        ]);

       DB::table('usuario')->where('id_usuario',intval($params['id_usuario']))->update([
            'usuario' => $params['nombresUpdate'],
            'email' => $params['emailUpdate'],
            'autorizado' => $activo,
            'activo' => $activo,
            'fecha_de_actualizacion' => $DateTime
        ]);



        return response()->json(array('status' => 200, 'msg' => "Usuario Actualizado Correctamente"), 200);
    }

    public function UpdatePassword(Request $request){
        $params = array();
        parse_str($request->data, $params);
        $DateTime = \Carbon\Carbon::now();


        DB::table('usuario')->where('id_usuario',intval($params['id_usuarioP']))->update([
            'password' => Hash::make($params['password2Update']),
            'fecha_de_actualizacion' => $DateTime
        ]);

        return response()->json(array('status' => 200, 'msg' => "Usuario Actualizado Correctamente"), 200);


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
