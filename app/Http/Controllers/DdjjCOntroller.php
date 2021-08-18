<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class DdjjCOntroller extends Controller
{
    public function getViewsddjj(Request $request){
       
        $rows = DB::select('select * from vw_info_contribuyente_industria where id_industria = 1');
        return response()->json($rows);

    }
}
