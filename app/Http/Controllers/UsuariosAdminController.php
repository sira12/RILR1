<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

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

            foreach($data as $user){
                $us=new User();
                $rolename=$us->roleNames($user->id_usuario);

                $user->rolenames=$rolename;
            }
            dd($data);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $actionBtn = '<span style="cursor: pointer;" onclick="EliminarMateriaPrimaAsignada()" title="Eliminar Materia prima"><i class="mdi mdi-delete font-24 text-danger"></i></span>
                    
                                 <span style="cursor: pointer;" data-placement="left" title="Actualizar Materia Prima" onclick="UpdateMateriaPrima();"><i class="mdi mdi-table-edit font-22 text-danger"></i></span>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
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
