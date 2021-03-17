<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Afectacion;
use App\Models\Documento;
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

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $afectacion=Afectacion::all();
        $tipo_documento=Documento::all();
        
        return view('auth.reggister',[

        'afectacion' => $afectacion,
        'tipo_doc'=>$tipo_documento
        
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
        


        echo "HOla"; 
        die();

        
        //registro usuario
        Auth::login($user = User::create([
            'usuario' => $request->nombre,
            'email' => $request->email_fiscal,
            'password' => Hash::make($request->password),
        ]));

        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }
}
