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


        echo "HOla"; 
        die();

        

        Auth::login($user = User::create([
            'usuario' => $request->nombre,
            'email' => $request->email_fiscal,
            'password' => Hash::make($request->password),
        ]));

        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }
}
