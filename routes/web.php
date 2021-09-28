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
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DdjjCOntroller;
use App\Http\Controllers\EconomiaController;
use App\Http\Controllers\IndustriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\MateriaPrimaController;
use App\Http\Controllers\PaisController;
use App\Http\Controllers\InsumoController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\GastosController;
use App\Http\Controllers\SituacionPlantaController;
use App\Http\Controllers\VentasyFacturacionController;
use App\Http\Controllers\PrevencionCAController;
use App\Http\Controllers\pruebaController;
use App\Http\Controllers\SistemasCalidadController;
use App\Mail\RegistroMailable;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;

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
Route::get('/a',[pruebaController::class,'index']);

Route::post('/subir',[pruebaController::class,'subirArchivo'])->name('subir');

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

Route::get('/sl', function () {
  Artisan::call('storage:link');
});

//check mail
Route::post('/check_mail',[RegisteredUserController::class,'prueba']);
//check cuil
Route::post('/check_cuil',[RegisteredUserController::class,'checkCuil']);
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
    Route::post('/saveGenerales',[ProcedimientosController::class,'storeGenerales'])->middleware(['auth']);
    Route::get('/edit/tramite/{id}',[ProcedimientosController::class,'edit'])->middleware(['auth']);
    Route::get('/tramite/{id}',[ProcedimientosController::class,'getTramite']);
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
    Route::post('/listRelbasico', [ServicioController::class, 'listRelbasico'])->middleware(['auth']);

    Route::post('/getFrecuencia', [ServicioController::class, 'frecuencia'])->middleware(['auth']);

    //combustible

      Route::post('/listRelcombustible', [ServicioController::class, 'listRelcombustible'])->middleware(['auth']);
    //otros
      Route::post('/search_servicio_otros', [ServicioController::class, 'search_servicio_otros'])->middleware(['auth']);

      Route::post('/listRelotros', [ServicioController::class, 'listRelotros'])->middleware(['auth']);

      //gastos 

    Route::post('/getGastos', [GastosController::class, 'getGastos'])->middleware(['auth']);
    Route::post('/saveDevengados', [GastosController::class, 'saveDevengados'])->middleware(['auth']);
    Route::post('/listRelGastos', [GastosController::class, 'listRelGastos'])->middleware(['auth']);
    Route::post('/getDevengados', [GastosController::class, 'getDevengados'])->middleware(['auth']);
    Route::post('/updateDevengados', [GastosController::class, 'updateDevengados'])->middleware(['auth']);
    
    //situacion de planta 
    
    Route::post('/savesituacion', [SituacionPlantaController::class, 'savesituacion'])->middleware(['auth']);
    Route::post('/listRelPlanta', [SituacionPlantaController::class, 'listRelPlanta'])->middleware(['auth']);
    Route::post('/getSituacion', [SituacionPlantaController::class, 'getSituacion'])->middleware(['auth']); 
    Route::post('/updatesituacion', [SituacionPlantaController::class, 'updatesituacion'])->middleware(['auth']);
    Route::post('/deleteSituacion', [SituacionPlantaController::class, 'deleteSituacion'])->middleware(['auth']);
    
    //motivo osiocidad
    Route::post('/traeMotivos_ociosidad', [SituacionPlantaController::class, 'traeMotivos'])->middleware(['auth']);
    Route::post('/saveMotivo', [SituacionPlantaController::class, 'saveMotivo'])->middleware(['auth']); 
    Route::post('/listRelMO', [SituacionPlantaController::class, 'listRelMotivo'])->middleware(['auth']);
    Route::post('/getMotivo', [SituacionPlantaController::class, 'getMotivo'])->middleware(['auth']); 
    Route::post('/updateMotivo', [SituacionPlantaController::class, 'updateMotivo'])->middleware(['auth']);
    Route::post('/deleteRelMotivo', [SituacionPlantaController::class, 'deleteRelMotivo'])->middleware(['auth']);

    //personal ocupado

    Route::post('/getRolTrabajadores', [SituacionPlantaController::class, 'getRolTrabajadores'])->middleware(['auth']);
    Route::post('/getCondicionLaboral', [SituacionPlantaController::class, 'getCondicionLaboral'])->middleware(['auth']);
    Route::post('/savePersonalOcupado', [SituacionPlantaController::class, 'savePersonalOcupado'])->middleware(['auth']);
    Route::post('/listRelTrabajador', [SituacionPlantaController::class, 'listRelTrabajador'])->middleware(['auth']);
    Route::post('/listRelTrabajadorF', [SituacionPlantaController::class, 'listRelTrabajadorF'])->middleware(['auth']);
    Route::post('/getRelPersonal', [SituacionPlantaController::class, 'getRelPersonal'])->middleware(['auth']);

    Route::post('/updateRelPersonal', [SituacionPlantaController::class, 'updateRelPersonal'])->middleware(['auth']);

    //Ventas y Facturacion 

    Route::post('/getCVentas', [VentasyFacturacionController::class, 'getCVentas'])->middleware(['auth']);
    Route::post('/getPVentas', [VentasyFacturacionController::class, 'getProvinciasVentas'])->middleware(['auth']);
    Route::post('/getPaisesVentas', [VentasyFacturacionController::class, 'getPaisesVentas'])->middleware(['auth']);
    Route::post('/saveVenta', [VentasyFacturacionController::class, 'saveVenta'])->middleware(['auth']);
    Route::post('/listVentas', [VentasyFacturacionController::class, 'listVentas'])->middleware(['auth']);
    Route::post('/ClasifIngresos', [VentasyFacturacionController::class, 'ClasifIngresos'])->middleware(['auth']);
    Route::post('/getVenta', [VentasyFacturacionController::class, 'getVenta'])->middleware(['auth']);
    Route::post('/updateVenta', [VentasyFacturacionController::class, 'updateVenta'])->middleware(['auth']);
    
    //facturacion
    Route::post('/saveFacturacion', [VentasyFacturacionController::class, 'saveFacturacion'])->middleware(['auth']);
    Route::post('/listFact', [VentasyFacturacionController::class, 'listFact'])->middleware(['auth']);
    Route::post('/getFac', [VentasyFacturacionController::class, 'getFac'])->middleware(['auth']);
    Route::post('/updateFacturacion', [VentasyFacturacionController::class, 'updateFacturacion'])->middleware(['auth']);
    Route::post('/deleteFac', [VentasyFacturacionController::class, 'deleteFac'])->middleware(['auth']);



    //efluentes

    Route::post('/search_efluente_e', [PrevencionCAController::class, 'search_efluente'])->middleware(['auth']);
    Route::post('/saveRelEfluenteIndustria', [PrevencionCAController::class, 'saveRelEfluente'])->middleware(['auth']);
    
    Route::post('/listRelEfluentes', [PrevencionCAController::class, 'listef'])->middleware(['auth']);
    
    Route::post('/getEfluente', [PrevencionCAController::class, 'getEfluente'])->middleware(['auth']);
    Route::post('/updateRelEfluenteIndustria', [PrevencionCAController::class, 'updateRelEfluenteIndustria'])->middleware(['auth']);
    Route::post('/deleteRelEfluente', [PrevencionCAController::class, 'deleteRelEfluente'])->middleware(['auth']);
    


    //certificados 

    Route::post('/getCertificados', [PrevencionCAController::class, 'getCertificados'])->middleware(['auth']);
    Route::post('/saveRelCert', [PrevencionCAController::class, 'saveRelCert'])->middleware(['auth']);
    Route::post('/lisRelCert', [PrevencionCAController::class, 'lisRelCert'])->middleware(['auth']);
    Route::post('/getRelcert', [PrevencionCAController::class, 'getRelcert'])->middleware(['auth']);
    Route::post('/updateRelCert', [PrevencionCAController::class, 'updateRelCert'])->middleware(['auth']);
    Route::post('/deleteRelCert', [PrevencionCAController::class, 'deleteRelCert'])->middleware(['auth']);

    //S. Calidad

    Route::post('/getSc', [SistemasCalidadController::class, 'getSc'])->middleware(['auth']);
    Route::post('/saveSc', [SistemasCalidadController::class, 'saveSc'])->middleware(['auth']);
    Route::post('/lisRelSc', [SistemasCalidadController::class, 'lisRelSc'])->middleware(['auth']);
    Route::post('/getRelSc', [SistemasCalidadController::class, 'getRelSc'])->middleware(['auth']);
    Route::post('/updateSc', [SistemasCalidadController::class, 'updateSc'])->middleware(['auth']);
    Route::post('/deleteRelSc', [SistemasCalidadController::class, 'deleteRelSc'])->middleware(['auth']);
   
   
   
   //promocion
    Route::post('/getPromo', [SistemasCalidadController::class, 'getPromo'])->middleware(['auth']);
    Route::post('/savePromo', [SistemasCalidadController::class, 'savePromo'])->middleware(['auth']);
    Route::post('/lisRelPromo', [SistemasCalidadController::class, 'lisRelPromo'])->middleware(['auth']);
    Route::post('/getRelPromo', [SistemasCalidadController::class, 'getRelPromo'])->middleware(['auth']);
    Route::post('/updateRelPromo', [SistemasCalidadController::class, 'updateRelPromo'])->middleware(['auth']);
    Route::post('/deleteRelPromo', [SistemasCalidadController::class, 'deleteRelPromo'])->middleware(['auth']);
    
    
    //economia
    Route::post('/getSP', [EconomiaController::class, 'getSP'])->middleware(['auth']);
    Route::post('/saveEc', [EconomiaController::class, 'saveEc'])->middleware(['auth']);
    Route::post('/lisReleco', [EconomiaController::class, 'lisReleco'])->middleware(['auth']);
    Route::post('/deleteRelEconomia', [EconomiaController::class, 'deleteRelEconomia'])->middleware(['auth']);

    //perfil
    Route::post('/getPerfil', [EconomiaController::class, 'getPerfil'])->middleware(['auth']);
    Route::post('/savePerfil', [EconomiaController::class, 'savePerfil'])->middleware(['auth']);
    Route::post('/lisRelPerfil', [EconomiaController::class, 'lisRelPerfil'])->middleware(['auth']);
    Route::post('/deleteRelPerfil', [EconomiaController::class, 'deleteRelPerfil'])->middleware(['auth']);

    //ddjj
    Route::post('/getViewsddjj', [DdjjCOntroller::class, 'getViewsddjj'])->middleware(['auth']);




//fin guardar Procedimientos


//datos generales Contribuyente
Route::get('/datos/{id}',[ContribuyenteController::class,'edit'] )->middleware(['auth'])->name('datosGenerales');
Route::post('/updateContribuyente',[ContribuyenteController::class,'updateContribuyente'])->middleware(['auth']);



// industria
Route::post('/getIndustria',[IndustriaController::class,'getIndustria'])->middleware(['auth']);


Route::get('/mail',function(){
  $correo=new RegistroMailable;
  Mail::to('siradlv@gmail.com')->send($correo); 
  Mail::to('mauriciogtoloza@gmail.com')->send($correo); 
   return "mensaje Enviado"; 
});