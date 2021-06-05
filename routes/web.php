<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarrioController;
use App\Http\Controllers\CalleController;
use App\Http\Controllers\ProvinciaController;
use App\Http\Controllers\LocalidadController;
use App\Http\Controllers\ProcedimientosController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ContribuyenteController;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\IndustriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\MateriaPrimaController;
use App\Http\Controllers\PaisController;
use App\Http\Controllers\InsumoController;
use App\Http\Controllers\ServicioController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



//Route::post('login','Auth\LoginController@login')->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('auth.loggin');
});


Route::get('/reggister', function () {
    return view('auth.reggister');
});

//########## Rutas Busquedas Autocomplete ################

Route::post('/barrios',[BarrioController::class,'getBarrios']);
Route::post('/calles',[CalleController::class,'getCalles']);
Route::post('/provincias',[ProvinciaController::class,'getProvincias']);
Route::post('/localidades',[LocalidadController::class,'getLocalidades']);
Route::post('/actividades',[ActividadController::class,'getActividades']);
Route::post('/getpais', [PaisController::class, 'getpais'])->middleware(['auth']);
//############ fin busquedas autocomplete ############


Route::get('/panel', [IndexController::class,'index'])->middleware(['auth'])->name('panel');

Route::get('/procedimientos',[ProcedimientosController::class,'index'] )->middleware(['auth'])->name('procedimientos');

//guardar Procedimientos
    //generales industria
    Route::post('/saveGenerales',[ProcedimientosController::class,'storeGenerales']);
    Route::get('/edit/tramite/{id}',[ProcedimientosController::class,'edit']);
    Route::post('/updateGenerales',[ProcedimientosController::class,'updateGeneral']);

    //actividad
    Route::post('/saveActividad',[ProcedimientosController::class,'storeActividad'])->middleware(['auth']);
    Route::post('/listRelAct', [ProcedimientosController::class, 'get_act_ind'])->name('listRelAct')->middleware(['auth']);
    Route::post('/getDetalleActividad', [ProcedimientosController::class, 'get_detalle_actividad'])->middleware(['auth']);
    Route::post('/updateActividad', [ProcedimientosController::class, 'updateActividad'])->middleware(['auth']);
    Route::post('/eliminarActividad', [ProcedimientosController::class, 'eliminarActividad'])->middleware(['auth']);
    Route::post('/BajaActividad', [ProcedimientosController::class, 'BajaActividad'])->middleware(['auth']);

    //unidades
    Route::post('/getUnidades', [ProcedimientosController::class, 'getUnidades'])->middleware(['auth']);

    //producto
    Route::post('/saveAsignacionProducto', [ProductoController::class, 'saveAsignacionProducto'])->middleware(['auth']);
    Route::post('/updateRelActProd', [ProductoController::class, 'updateRelActProd'])->middleware(['auth']);
    Route::post('/eliminarProductoAsignado', [ProductoController::class, 'eliminarProductoAsignado'])->middleware(['auth']);
    Route::post('/buscarProducto', [ProductoController::class, 'busqueda_producto'])->middleware(['auth']);
    Route::post('/getDatosProducto', [ProductoController::class, 'getDatosProducto'])->middleware(['auth']);
    Route::post('/listRelActProd', [ProductoController::class, 'listRelActProd'])->middleware(['auth']);

    //materia prima
    Route::post('/listmatprima', [MateriaPrimaController::class, 'listmatprima'])->middleware(['auth']);
    Route::post('/motivoImportacion', [MateriaPrimaController::class, 'motivoImportacion'])->middleware(['auth']);
    Route::post('/getMateriaPrima', [MateriaPrimaController::class, 'getMateriaPrima'])->middleware(['auth']);
    Route::post('/saveAsignacionMateria', [MateriaPrimaController::class, 'saveAsignacionMateria'])->middleware(['auth']);
    Route::post('/eliminarMateriaPrima', [MateriaPrimaController::class, 'eliminarMateriaPrima'])->middleware(['auth']);
    Route::post('/getRelMatPrima', [MateriaPrimaController::class, 'getRelMatPrima'])->middleware(['auth']);
    Route::post('/updateRelActMat', [MateriaPrimaController::class, 'updateRelActMat'])->middleware(['auth']);


    //insumos

    Route::post('/search_insumo', [InsumoController::class, 'search_insumo'])->middleware(['auth']);
    Route::post('/saveInsumo', [InsumoController::class, 'store'])->middleware(['auth']);
    Route::post('/listInsumos', [InsumoController::class, 'listInsumos'])->middleware(['auth']);
    Route::post('/getInsumo', [InsumoController::class, 'getInsumo'])->middleware(['auth']);
    Route::post('/updateInsumo', [InsumoController::class, 'updateRelInsumo'])->middleware(['auth']);
    Route::post('/deleteRelInsumo', [InsumoController::class, 'deleteRel'])->middleware(['auth']);

    //servicios basicos

    Route::post('/ser_basicos', [ServicioController::class, 'listar_servicios_basicos'])->middleware(['auth']);
    Route::post('/saveServicio', [ServicioController::class, 'saveRelServicio'])->middleware(['auth']);

    Route::post('/getServicio', [ServicioController::class, 'getServicio'])->middleware(['auth']);
    Route::post('/updateServicio', [ServicioController::class, 'updateRelServicio'])->middleware(['auth']);
    Route::post('/deleteServicio', [ServicioController::class, 'deleteRelServicio'])->middleware(['auth']);

    //combustible

      Route::post('/listRelcombustible', [ServicioController::class, 'listRelcombustible'])->middleware(['auth']);
    //otros
      Route::post('/search_servicio_otros', [ServicioController::class, 'search_servicio_otros'])->middleware(['auth']);




//fin guardar Procedimientos


//datos generales Contribuyente
Route::get('/datos/{id}',[ContribuyenteController::class,'edit'] )->middleware(['auth'])->name('datosGenerales');
Route::post('/updateContribuyente',[ContribuyenteController::class,'updateContribuyente'])->middleware(['auth']);


// industria
Route::post('/getIndustria',[IndustriaController::class,'getIndustria'])->middleware(['auth']);
