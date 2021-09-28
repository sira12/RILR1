<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actividad;

class ActividadController extends Controller
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = array();
        parse_str($request->data, $params);

        dd($params);
        die();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getActividades(Request $request)
    {

        $response = array();

        if ($request->search == '') {
            $actividades = Actividad::orderby('nomenclatura_ib', 'asc')->select('id_Actividad', 'actividad')->limit(5)->get();
        } else {

            if ($request->filtro == 1) {
                //busco por descripcion
                $actividades = Actividad::where("actividad", "LIKE", "%{$request->search}%")
                    ->where('activo', 'S')
                    ->get();

                foreach ($actividades as $actividad) {
                    $response[] = array(
                        "value" => $actividad->id_Actividad,
                        "label" => $actividad->actividad,
                        "actividad" => trim($actividad->nomenclatura_ib)
                    );
                }
            } else {
                //por codigo
                $actividades = Actividad::where("nomenclatura_ib", "LIKE", "%{$request->search}%")
                    ->where('activo', 'S')
                    ->get();

                foreach ($actividades as $actividad) {
                    $response[] = array(
                        "value" => $actividad->id_Actividad,
                        "label" => trim($actividad->nomenclatura_ib),
                        "actividad" => $actividad->actividad
                    );
                }
            }
        }


        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
