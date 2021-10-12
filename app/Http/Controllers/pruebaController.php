<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pruebaController extends Controller
{

    public function index()
    {
            return view('archivo');
    }
    public function subirArchivo(Request $request)
    {
            //Recibimos el archivo y lo guardamos en la carpeta storage/app/public
            $request->file('archivo')->store('public');
            dd("subido y guardado");
    }
}
