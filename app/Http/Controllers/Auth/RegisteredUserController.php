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
use Symfony\Component\HttpKernel\Event\RequestEvent;

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

                       
            $fecha_time = \Carbon\Carbon::now();            
            $fecha = \Carbon\Carbon::now()->format('d-m-Y');


            $arrayRollBack=[];
            $arrayRollBack['cuitContribuyente']=(int)$request->cuit;
            $arrayRollBack['emailUser']= $request->email_fiscal;
            $arrayRollBack['dni']=$request->documento;
            
            $dataCountries=$this->saveDataCountries($request); 


            $contribuyente = DB::table('contribuyente')->where('cuit', (int)$request->cuit)->get();           
            if (count($contribuyente) > 0) {
                return response()->json(array('status' => 1, 'msg' => "El cuit ingresado ya existe"), 200);
            }

            $mail = DB::table('usuario')->where('email', $request->email_fiscal)->get();
            if (count($mail) > 0) {
                return response()->json(array('status' => 1, 'msg' => "El mail ingresado ya existe"), 200);
            }                    

            //persona
            $persona = new PersonaController();
            $id_persona = $persona->Store($request, $dataCountries['id_localidad'], $dataCountries['id_barrio'], $dataCountries['id_calle']);

            //contribuyente
            $contribuyente = new ContribuyenteController();
            $id_contribuyente = $contribuyente->store($request);

            if ($id_persona == "error" || $id_contribuyente == "error") {
                //TODO crear funcion rollback
                //SI HAY UN ERROR EN PERSONA O CONTRIBUYENTE
                $this->rollBack($arrayRollBack);
                return response()->json(array('status' => 1, 'msg' => "Ha Ocurrido un error"), 200);
            }


            //rel persona contribuyente
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


            $id = DB::table('rel_persona_contribuyente')->insertGetId([
                'id_persona' => $id_persona,
                'id_contribuyente' => $id_contribuyente,
                'id_tipo_de_afectacion' => $request->id_tipo_de_afectacion,
                'autorizado' => "P",
                'fecha_de_actualizacion' => $fecha_time,
                'documento_vinculante' => $path1,
                'documento_poder' => $path2
            ]);

            if (!is_int($id)) {

                //TODO: funcion rollback                
                $this->rollBack($arrayRollBack);
                return response()->json(array('status' => 1, 'msg' => "Ha Ocurrido un error"), 200);
            } else {

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
                DB::table('user_role')->insert([
                    'id_user' => $user,
                    'id_role' => 2 //rol contribuyente
                ]);


                $correo = new RegistroMailable;
                Mail::to($request->email_fiscal)->send($correo);

                return response()->json(array('status' => 200, 'msg' => "Guardado Correctamente"), 200);
            }

        } catch (\Throwable $th) {

            return response()->json([
                'status' => 400,
                'msg' => 'Ha ocurrido un error',
                'errors'  => $th->getMessage(),
            ], 400);
        }
    }


     /*
        # FUNCION PARA REALIZAR UN ROLLBACK EN CASO DE ERROR
        ES DECIR: SI HAY UN ERROR AL CREAR LA PERSONA O CONTRIBUYENTE BORRAR DATOS PARA QE NO QUEDEN REGISTROS SOMBIES  
    */
    private function rollBack($arrayRollback){
        $contribuyente = DB::table('contribuyente')->where('cuit', $arrayRollback['cuitContribuyente'])->get();           
        if (count($contribuyente) > 0) {
           DB::table('contribuyente')->where('cuit', $arrayRollback['cuitContribuyente'])->delete();           
        }

        $mail = DB::table('usuario')->where('email', $arrayRollback['emailUser'])->get();
        if (count($mail) > 0) {
           DB::table('usuario')->where('email', $arrayRollback['emailUser'])->delete();
        }
    }

    /*
    # FUNCION PARA GUARDAR LOCALIDAD, CALLE O BARRIO SI NO EXISTE  
    */
    private function saveDataCountries(Request $request){

        
        $arrayResponse=[];
        if ($request->id_localidad == null || $request->id_localidad == '') {
            $localidad = new LocalidadController();
            $arrayResponse['id_localidad'] = $localidad->store($request->search_localidad, $request->id_provincia);
        } else {
            $arrayResponse['id_localidad'] = (int)$request->id_localidad;
        }
        //si el barrio no fue encontrado, guardamos nuevo barrio
        if ($request->id_barrio == null || $request->id_barrio == '') {
            $barrio = new BarrioController();
            $arrayResponse['id_barrio'] = $barrio->store($request, $arrayResponse['id_localidad']);
        } else {
            $arrayResponse['id_barrio'] = (int)$request->id_barrio;
        }

        //si la calle no fue encontrada, Guardar nueva calle
        if ($request->id_calle == null || $request->id_calle == '') {
            $calle = new CalleController();
            $arrayResponse['id_calle'] = $calle->store($request, $arrayResponse['id_localidad']);
        } else {
            $arrayResponse['id_calle'] = (int)$request->id_calle;
        }

        return $arrayResponse;

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
