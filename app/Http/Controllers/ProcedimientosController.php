<?php

namespace App\Http\Controllers;

use App\Models\Industria;
use App\Models\PeriodoActividadIndustria;
use App\Models\Persona;
use Illuminate\Http\Request;
use App\Models\RegimenIB;
use App\Models\CondicionIva;
use App\Models\NaturalezaJuridica;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Table;
use App\Models\Contribuyente;
use App\Models\PeriodoActividadContribuyente;
use App\Models\PuntoCardinal;


class ProcedimientosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $regimen = RegimenIB::where('activo', "S")->get();
        $iva = CondicionIva::where('activo', "S")->get();
        $naturaleza_juridica = NaturalezaJuridica::where('activo', "S")->get();

        $per_fiscal = DB::table('periodo_fiscal')->where('anio', Carbon::now()->format('Y'))->first();

        $user = auth()->user();
        $rel = DB::table('rel_persona_contribuyente')->where('id_rel_persona_contribuyente', $user->id_rel_persona_contribuyente)->select('id_contribuyente', 'id_persona')->first();
        $cuit = DB::table('contribuyente')->where('id_contribuyente', $rel->id_contribuyente)->select('cuit')->first();
        $zona = PuntoCardinal::all();


        return view('Procedimientos.procedimientos', [
            'id_persona' => $rel->id_persona,
            'id_contribuyente' => $rel->id_contribuyente,
            'cuit' => $cuit,
            'per_fiscal' => $per_fiscal,
            'regimen' => $regimen,
            'condicion_iva' => $iva,
            'naturaleza_juridica' => $naturaleza_juridica,
            'zona' => $zona
        ]);
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeGenerales(Request $request)
    {
        $params = array();
        parse_str($request->data, $params);

        //update Contribuyente
        $contribuyente = new ContribuyenteController();
        $contribuyente->updateContribuyente($request);

        //cargar periodo
        $per_act_con = new PeriodoActividadContribuyenteController();
        $id_periodo_save = $per_act_con->store($request);

        //cargar industria
        $industria = new IndustriaController();
        $id_industria = $industria->store($request);


        //cargar periodo industria

        $per_act_indu = new PeriodoActividadIndustriaController();
        $id_periodo_indu = $per_act_indu->store($request, $id_industria);

        //actualizar datos persona

        //$persona = new PersonaController();
       // $id_persona = $persona->updatePersona($request);


       return response()->json(['success'=>1]);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {

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

        $per_fiscal = DB::table('periodo_fiscal')->where('anio', Carbon::now()->format('Y'))->first();

        $user = auth()->user();

        $rel = DB::table('rel_persona_contribuyente')
            ->join('persona', 'rel_persona_contribuyente.id_persona', '=', 'persona.id_persona')
            ->select('rel_persona_contribuyente.id_contribuyente',
                'rel_persona_contribuyente.id_persona',
                'persona.tel_fijo as fijo_legal',
                'persona.tel_celular as celular_legal',
            )
            ->where('id_rel_persona_contribuyente', $user->id_rel_persona_contribuyente)
            ->first();

        $cuit = DB::table('contribuyente')->where('id_contribuyente', $rel->id_contribuyente)->select('cuit')->first();
        $zona = PuntoCardinal::all();

        $mi_industria = DB::table('industria')
            ->join('contribuyente', 'industria.id_contribuyente', '=', 'contribuyente.id_contribuyente')
            ->join('punto_cardinal as punto_planta', 'industria.id_punto_cardinal', '=', 'punto_planta.id_punto_cardinal')
            ->join('punto_cardinal as punto_legal', 'contribuyente.id_punto_cardinal', '=', 'punto_legal.id_punto_cardinal')
            ->join('localidad as localidad_planta', 'industria.id_localidad', '=', 'localidad_planta.id_localidad')
            ->join('provincia as provincia_planta', 'localidad_planta.id_provincia', '=', 'provincia_planta.id_provincia')
            ->join('barrio as barrio_planta', 'industria.id_barrio', '=', 'barrio_planta.id_barrio')
            ->join('calle as calle_planta', 'industria.id_calle', '=', 'calle_planta.id_calle')
            ->join('barrio', 'industria.id_barrio', '=', 'barrio.id_barrio')
            ->join('calle', 'industria.id_calle', '=', 'calle.id_calle')
            ->join('regimen_ib', 'contribuyente.id_regimen_ib', '=', 'regimen_ib.id_regimen_ib')
            ->join('condicion_iva', 'contribuyente.id_condicion_iva', '=', 'condicion_iva.id_condicion_iva')
            ->join('naturaleza_juridica', 'contribuyente.id_naturaleza_juridica', '=', 'naturaleza_juridica.id_naturaleza_juridica')
            ->join('localidad as localidad_legal', 'contribuyente.id_localidad', '=', 'localidad_legal.id_localidad')
            ->join('provincia as provincia_legal', 'localidad_legal.id_provincia', '=', 'provincia_legal.id_provincia')
            ->join('barrio as barrio_legal', 'contribuyente.id_barrio', '=', 'barrio_legal.id_barrio')
            ->join('calle as calle_legal', 'contribuyente.id_calle', '=', 'calle_legal.id_calle')
            ->select(
                'industria.*',
                'industria.id_localidad as id_localidad_planta',
                'industria.id_barrio as id_barrio_planta',
                'industria.id_calle as id_calle_planta',
                'localidad_planta.localidad as localidad_planta',
                'localidad_planta.id_provincia as id_provincia_planta',
                'provincia_planta.provincia as provincia_planta',
                'barrio_planta.barrio as barrio_planta',
                'calle_planta.calle as calle_planta',
                'punto_planta.id_punto_cardinal as id_punto_planta',
                'punto_planta.punto_cardinal as punto_planta',
                'industria.numero as nro_calle_planta',
                'industria.piso as piso_planta',
                'industria.depto as depto_planta',
                'industria.referencia_domicilio as referencia_planta',

                'contribuyente.*',
                'contribuyente.id_localidad as id_localidad_legal',
                'contribuyente.id_barrio as id_barrio_legal',
                'contribuyente.id_calle as id_calle_legal',
                'localidad_legal.localidad as localidad_legal',
                'localidad_legal.id_provincia as id_provincia_legal',
                'provincia_legal.provincia as provincia_legal',
                'barrio_legal.barrio as barrio_legal',
                'calle_legal.calle as calle_legal',
                'punto_legal.punto_cardinal as punto_legal',
                'punto_legal.id_punto_cardinal as id_punto_legal',
                'contribuyente.numero as nro_calle_legal',
                'contribuyente.piso as piso_legal',
                'contribuyente.depto as depto_legal',
                'contribuyente.referencias_domicilio as referencia_legal',


                'regimen_ib.regimen_ib',
                'condicion_iva.condicion_iva',
                'naturaleza_juridica.naturaleza_juridica',

            )
            ->where('industria.id_industria', $id)
            ->get();


        return view('Procedimientos.edit_procedimientos', [
            'id_persona' => $rel->id_persona,
            'id_contribuyente' => $rel->id_contribuyente,
            'tel_fijo_legal' => $rel->fijo_legal,
            'tel_celular_legal' => $rel->celular_legal,
            'cuit' => $cuit,
            'per_fiscal' => $per_fiscal,
            'regimen' => $regimen,
            'condicion_iva' => $iva,
            'naturaleza_juridica' => $naturaleza_juridica,
            'zona' => $zona,
            'mi_industria' => $mi_industria
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
     * @return int
     */
    public function updateGeneral(Request $request)
    {

        $params = array();
        parse_str($request->data, $params);



        //update Contribuyente
        $contribuyente = new ContribuyenteController();
        $contribuyente->updateContribuyente($request);

        //cargar periodo
        $per_act_con = new PeriodoActividadContribuyenteController();
        $id_periodo_save = $per_act_con->updatePeriodo($request);

        die();



        //cargar industria
        $industria = new IndustriaController();
        $id_industria = $industria->store($request);


        //cargar periodo industria

        $per_act_indu = new PeriodoActividadIndustriaController();
        $id_periodo_indu = $per_act_indu->store($request, $id_industria);

        //actualizar datos persona

        //$persona = new PersonaController();
       // $id_persona = $persona->updatePersona($request);


       return response()->json(['success'=>1]);

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
