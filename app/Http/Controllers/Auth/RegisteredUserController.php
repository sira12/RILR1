<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Afectacion;
use App\Models\Documento;
use App\Models\PersonaJuridica;
use App\Models\Barrio;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\BarrioController;
use App\Http\Controllers\CalleController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ContribuyenteController;
use App\Http\Controllers\LocalidadController;
use App\Mail\RegistroMailable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Stmt\TryCatch;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        $personaJuridica = PersonaJuridica::all();
        $afectacion = Afectacion::where('activo', "S")->get();
        $tipo_documento = Documento::all();
        $provincias = DB::table('provincia')->where('id_pais', 1)->get();

        return view('auth.reggister', [
            'provincias' => $provincias,
            'afectacion' => $afectacion,
            'tipo_doc' => $tipo_documento,
            'personaJuridica' => $personaJuridica

        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        try {
            $contribuyente = DB::table('contribuyente')->where('cuit', $request->cuit)->get();
            if (count($contribuyente) > 0) {
                return response()->json(array('status' => 1, 'msg' => "El cuit ingresado ya existe"), 200);
            }

            $mail = DB::table('usuario')->where('email', $request->email_fiscal)->get();
            if (count($mail) > 0) {
                return response()->json(array('status' => 1, 'msg' => "El mail ingresado ya existe"), 200);
            }



            if ($request->id_localidad == null) {
                $localidad = new LocalidadController();
                $id_localidad = $localidad->Store($request->search_localidad, $request->id_provincia);
            } else {
                $id_localidad = $request->id_localidad;
            }
            //si el barrio no fue encontrado, guardamos nuevo barrio
            if ($request->id_barrio == null) {
                $barrio = new BarrioController();
                $id_barrio = $barrio->Store($request, $id_localidad);
            } else {
                $id_barrio = $request->id_barrio;
            }

            //si la calle no fue encontrada, Guardar nueva calle
            if ($request->id_calle == null) {
                $calle = new CalleController();
                $id_calle = $calle->Store($request, $id_localidad);
            } else {
                $id_calle = $request->id_calle;
            }

            //persona

            $persona = new PersonaController();
            //le paso los datos a guardar, y obtengo el id del registro que se acaba de cargar
            $id_persona = $persona->Store($request, $id_localidad, $id_barrio, $id_calle);


            //contribuyente

            $contribuyente = new ContribuyenteController();
            //le paso los datos a guardar, y obtengo el id del registro que se acaba de cargar
            $id_contribuyente = $contribuyente->Store($request);


            //rel persona contribuyente
            $fecha = \Carbon\Carbon::now()->format('d-m-Y');

            if ($request->tipo_personeria == 2) {
                //para vinculacion
                $vinculacion = $request->file('vinculacion');
                //guardo en disco para pdfs
                $path1 = $vinculacion->storeAs("/documents/vinculacion", ($request->documento . "_" . $fecha . '.' . $vinculacion->extension()));
            } else {
                $path1 = NULL; //se le pasa nulo, ya que no solicita el doc vinculante
            }

            //para apoderado
            if ($request->id_tipo_de_afectacion == 5) {
                $apoderado = $request->file('apoderado');
                //guardo en disco para pdfs
                $path2 = $apoderado->storeAs("/documents/apoderado", ($request->documento . "_" . $fecha . '.' . $apoderado->extension()));
            } else {
                $path2 = NULL;
            }

            $fecha_time = \Carbon\Carbon::now();

            $id = DB::table('rel_persona_contribuyente')->insertGetId([
                'id_persona' => $id_persona,
                'id_contribuyente' => $id_contribuyente,
                'id_tipo_de_afectacion' => $request->id_tipo_de_afectacion,
                'autorizado' => "P",
                'fecha_de_actualizacion' => $fecha_time,
                'documento_vinculante' => $path1,
                'documento_poder' => $path2
            ]);

            //registro usuario
            $user = DB::table('usuario')->insertGetId([
                'id_rel_persona_contribuyente' => $id,
                'usuario' => $request->nombre,
                'email' => $request->email_fiscal,
                'password' => Hash::make($request->password),
                'autorizado' => "P",
                'fecha_alta' => $fecha_time,
                'activo' => "P",
                'fecha_de_actualizacion' => $fecha_time
            ]);

            //se le asigna el rol de contribuyente
            DB::table('user_role')->insertGetId([
                'id_user'=>$user,
                'id_role'=>2
            ]);

            //event(new Registered($user));

            $correo = new RegistroMailable;
            Mail::to($request->email_fiscal)->send($correo);

            return response()->json(array('status' => 200, 'msg' => "Guardado Correctamente"), 200);
        } catch (\Throwable $th) {

            return response()->json([
                'status' => 400,
                'msg' => 'Ha ocurrido un error',
                'errors'  => $th->getMessage(),
            ], 400);
        }
    }


    public function checkmail(Request $request)
    {
        $mail = DB::table('usuario')->where('email', $request->mail)->get();
        $control = "noexiste";
        if (count($mail) > 0) {
            $control = "existe";
        }

        return response()->json(array('status' => 200, 'msg' => $control), 200);
    }

    public function checkCuil(Request $request)
    {

        $contribuyente = DB::table('contribuyente')->where('cuit', $request->cuit)->get();
        $control = "noexiste";
        if (count($contribuyente) > 0) {
            $control = "existe";
        }

        return response()->json(array('status' => 200, 'msg' => $control), 200);
    }
}
