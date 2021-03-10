<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarrioController;

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


Route::post('/barrios',[BarrioController::class,'getBarrios']);

