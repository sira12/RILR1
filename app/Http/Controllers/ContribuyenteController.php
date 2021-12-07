<?php

namespace App\Http\Controllers;

use App\Models\PersonaJuridica;
use Illuminate\Http\Request;
use App\Models\Contribuyente;
use Carbon\Carbon;
use App\Models\RegimenIB;
use App\Models\CondicionIva;
use App\Models\NaturalezaJuridica;
use App\Models\PuntoCardinal;
use App\Models\PeriodoActividadContribuyente;
use Illuminate\Support\Facades\DB;

class ContribuyenteController extends Controller
{

    public function getContribuyente(Request $request)
    {

        $contribuyente = DB::table('contribuyente')->where('id_contribuyente', intval($request->id_contribuyente))->get();
        return response()->json($contribuyente);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $contribuyente = new Contribuyente();

        $contribuyente->cuit = intval($request->cuit);
        $contribuyente->razon_social = $request->razonsocial;

        $contribuyente->email_fiscal = $request->email_fiscal;
        $contribuyente->fecha_de_actualizacion = Carbon::now();
        $contribuyente->activo = "P";
        $contribuyente->id_persona_juridica = $request->tipo_personeria;


        $afip = $request->file('afip');



        $fecha = \Carbon\Carbon::now()->format('d-m-Y');

        //guardar imagen

        //guardo en disco para pdfs
        $path = $afip->storeAs("/documents/contribuyentes", ($request->cuit . "_" . $fecha . '.' . $afip->extension()));

        $contribuyente->constancia_afip = $path;

        $contribuyente->save();
        //id del registro que se acaba de cargar
        $id = $contribuyente->id_contribuyente;

        return $id;
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {

        $regimen = RegimenIB::where('activo', "S")->get();
        $iva = CondicionIva::where('activo', "S")->get();
        $naturaleza_juridica = NaturalezaJuridica::where('activo', "S")->get();
        $persona_juridica = PersonaJuridica::where('activo', "S")->get();

        $per_fiscal = DB::table('periodo_fiscal')->where('anio', Carbon::now()->format('Y'))->first();

        $user = auth()->user();
        $rel = DB::table('rel_persona_contribuyente')->where('id_rel_persona_contribuyente', $user->id_rel_persona_contribuyente)->select('id_contribuyente', 'id_persona')->first();

        $contribuyente = DB::table('contribuyente')
            ->leftjoin('regimen_ib', 'contribuyente.id_regimen_ib', '=', 'regimen_ib.id_regimen_ib')
            ->leftjoin('condicion_iva', 'contribuyente.id_condicion_iva', '=', 'condicion_iva.id_condicion_iva')
            ->leftjoin('naturaleza_juridica', 'contribuyente.id_naturaleza_juridica', '=', 'naturaleza_juridica.id_naturaleza_juridica')
            ->leftjoin('localidad', 'contribuyente.id_localidad', '=', 'localidad.id_localidad')
            ->leftjoin('provincia', 'localidad.id_provincia', '=', 'provincia.id_provincia')
            ->leftjoin('barrio', 'contribuyente.id_barrio', '=', 'barrio.id_barrio')
            ->leftjoin('calle', 'contribuyente.id_calle', '=', 'calle.id_calle')
            ->leftjoin('punto_cardinal', 'contribuyente.id_punto_cardinal', '=', 'punto_cardinal.id_punto_cardinal')
            ->leftjoin('persona_juridica', 'contribuyente.id_persona_juridica', '=', 'persona_juridica.id_persona_juridica')
            ->select(
                'contribuyente.*',
                'regimen_ib.regimen_ib as regimen',
                'condicion_iva.condicion_iva as condicion',
                'naturaleza_juridica.naturaleza_juridica as naturaleza',
                'localidad.localidad as loc',
                'localidad.id_provincia as id_prov',
                'provincia.provincia',
                'barrio.barrio as barrio',
                'calle.calle',
                'punto_cardinal.punto_cardinal',
                'persona_juridica.persona_juridica'
            )
            ->where('id_contribuyente', $rel->id_contribuyente)
            ->first();

        $zona = PuntoCardinal::all();



        return view('Contribuyente.edit', [
            'id_contribuyente' => $id,
            'regimen' => $regimen,
            'condicion_iva' => $iva,
            'naturaleza_juridica' => $naturaleza_juridica,
            'zona' => $zona,
            'contribuyente' => $contribuyente,
            'persona_juridica' => $persona_juridica
        ]);
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
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateContribuyente(Request $request)
    {
        $params = array();
        parse_str($request->data, $params);


        $fecha = Carbon::createFromFormat('d-m-Y', $params['fecha_actividad_contribuyente'])->toDateTimeString();

        $email_duplicado = Contribuyente::where('id_contribuyente', '!=', $params['id_contribuyente'], 'and')
            ->where('email_fiscal', '=', $params['email_fiscal'])->get();

        if (count($email_duplicado) > 0) {
            // si el mail está duplicado
            $msg = "El email fiscal ingresado ya está utilizado por otro contribuyente, por favor ingrese un email fiscal distinto";
            return response()->json(array('status' => 1, 'msg' => $msg), 200);
        } else {
            //si el mail no está duplicado

            $contribuyente = Contribuyente::find($params['id_contribuyente']);

            $contribuyente->razon_social = $params['razon_social'];
            //$contribuyente->id_persona_juridica=$params['persona_juridica'];
            $contribuyente->email_fiscal = $params['email_fiscal'];
            $contribuyente->id_localidad = intval($params['id_localidad_administracion']);
            $contribuyente->id_barrio = intval($params['id_barrio_administracion']);
            $contribuyente->id_calle = intval($params['id_calle_administracion']);
            $contribuyente->numero = $params['nro_calle_legal'];
            $contribuyente->piso = $params['nro_piso_legal'];
            $contribuyente->depto = $params['nro_departamento_legal'];
            $contribuyente->referencias_domicilio = $params['referencia_legal'];
            $contribuyente->id_regimen_ib = intval($params['id_regimen_ib']);
            $contribuyente->numero_de_ib = $params['numero_de_ib'];
            $contribuyente->id_condicion_iva = intval($params['id_condicion_iva']);
            $contribuyente->id_naturaleza_juridica = intval($params['id_naturaleza_juridica']);
            $contribuyente->fecha_inicio_de_actividades = $fecha;
            $contribuyente->cod_postal = $params['cod_postal'];
            $contribuyente->id_punto_cardinal = intval($params['zona_administracion']);


            ## periodo
            $periodo = PeriodoActividadContribuyente::where('id_contribuyente', $params['id_contribuyente'])->first();
            $per_act_con = new PeriodoActividadContribuyenteController();

            if (!$periodo) {
                //cargar periodo
                $id_periodo = $per_act_con->store($request);
            } else {
                //actualizar periodo
                $id_periodo = $per_act_con->update($request, $periodo['id_periodo_de_actividad_de_contribuyente']);
            }
            ####
            $contribuyente->save();

            $msg = "¡Datos Actualizados exitosamente!";
            return response()->json(array('status' => 200, 'msg' => $msg), 200);
        }
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
