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
use Illuminate\Support\Facades\DB;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        $personaJuridica=PersonaJuridica::all();
        $afectacion=Afectacion::where('activo',"S")->get();
        $tipo_documento=Documento::all();
        
        return view('auth.reggister',[

        'afectacion' => $afectacion,
        'tipo_doc'=>$tipo_documento,
        'personaJuridica'=>$personaJuridica
        
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
            
        //validar cada campo 
            $validate= $request->validate([
                'nombre' => 'required|min:5|max:30',
                'cuit' => 'numeric|required|digits_between:11,11',
                'razonsocial'=>'required|min:5|max:18',
                'documento'=>'required|min:5|max:18'
            ]);
                    
        //si el barrio no fue encontrado, guardamos nuevo barrio
            if($request->id_barrio == null){
                $barrio = new BarrioController();
                $barrio->Store($request);
            }

        //si la calle no fue encontrada, Guardar nueva calle
            if($request->id_calle == null){
                $calle = new CalleController();
                $calle->Store($request);
            }

        //persona

            $persona = new PersonaController();
            //le paso los datos a guardar, y obtengo el id del registro que se acaba de cargar 
            $id_persona=$persona->Store($request);

        
       
        //contribuyente

            $contribuyente = new ContribuyenteController();
            //le paso los datos a guardar, y obtengo el id del registro que se acaba de cargar 
            $id_contribuyente=$contribuyente->Store($request);


        //rel persona contribuyente

        if($request->tipo_personeria == 2){


        $vinculacion = $request->file('vinculacion');
        $nombre_vinculacion = strtolower($vinculacion->getClientOriginalName());

        //compruebo mimes
        $findme0   = '.jpg';
        $findme   = '.png';
        $findme2 = '.pdf';

        $pos0 = strpos($nombre_vinculacion, $findme0);
        $pos1 = strpos($nombre_vinculacion, $findme);
        $pos2 = strpos($nombre_vinculacion, $findme2);

        $fecha = \Carbon\Carbon::now()->format('d-m-Y');

        //guardar imagen
            //detectar mime, para mandar a un disco u otro
            if ($pos1 !== false || $pos0 !== false) {
                //es una imagen,guardo en disco para imagenes

                $path1 = $vinculacion->storeAs("/images/vinculacion",($request->documento . "_". $fecha . '.' . $vinculacion->extension()));
            } else if ( $pos2 !== false) {        
                //guardo en disco para pdfs
                $path1 = $vinculacion->storeAs("/documents/vinculacion",($request->documento . "_" . $fecha . '.' . $vinculacion->extension()));

            }

        }else{
            $path1=NULL; //se le pasa nulo, ya que no solicita el doc vinculante
        }

        $fecha=\Carbon\Carbon::now();

        $id=DB::table('rel_persona_contribuyente')->insertGetId([
            'id_persona' => $id_persona,
            'id_contribuyente' => $id_contribuyente,
            'id_tipo_de_afectacion'=>$request->id_tipo_de_afectacion,
            'autorizado'=>"P",
            'fecha_de_actualizacion'=>$fecha,
            'documento_vinculante'=>$path1
        ]);
                
        //registro usuario
        $user = User::create([
            'id_rel_persona_contribuyente'=>$id,
            'usuario' => $request->nombre,
            'email' => $request->email_fiscal,
            'password' => Hash::make($request->password),
            'autorizado'=>"P",
            'fecha_alta'=>$fecha,
            'activo'=>"P",
            'fecha_de_actualizacion'=>$fecha
        ]);

        event(new Registered($user));

        return redirect('/');
    }
}
