<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class User extends Controller
{


    public function GetinfoUser()
    {
        $user = auth()->user();
        $user->roles = $this->getRoleUser($user->id_usuario);
        $user->roleNames = $this->roleNames($user->id_usuario);
        return $user;
    }


    public function roleNames($id_usuario)
    {

        $roles = DB::table('user_role')->where('id_user', '=', $id_usuario)
            ->join('rol', 'user_role.id_role', 'rol.id_rol')
            ->select(
                'rol.rol',
            )
            ->get();

        $rolename = "";
        $count = count($roles);
        $i = 0;
        foreach ($roles as $key => $role) {

            $rolename .= $role->rol;

            if ($i < $count && ($i+1) < $count) {
                $rolename = $rolename . ",";
            }
            $i += 1;
        }

        return $rolename;
    }

    public function getRoleUser($id_usuario)
    {

        $roles = DB::table('user_role')->where('id_user', '=', $id_usuario)
            ->join('rol', 'user_role.id_role', 'rol.id_rol')
            ->select(
                'rol.id_rol',
                'rol.rol',
                'rol.description'
            )
            ->get();

        foreach ($roles as $key => $role) {

            $permisos = DB::table('permiso')->where('id_rol', $role->id_rol)
                ->select(
                    'permiso.id_permiso',
                    'permiso.seccion',
                    'permiso.ver',
                    'permiso.agregar',
                    'permiso.modificar',
                    'permiso.borrar',
                )
                ->get();
            $role->permisos = $permisos;
        }
        return $roles;
    }





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
