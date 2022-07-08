<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ActivosController;
use App\Http\Controllers\GastosController;

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
session_start();



if (isset($_SESSION['user_id'])){

    //ruta para salir del sistema
    Route::get('/salir', [UsersController::class,"logout"])->name("logout");

    // gestion de usuarios
    Route::get('/users/nuevo', [UsersController::class,"add"])->name("users-add");
    Route::get('/users/editar/{id}', [UsersController::class,"edit"])->name("users-edit");
    Route::post('/users/store', [UsersController::class,"store"])->name("users-store");
    Route::get('/users/delete/{id}', [UsersController::class,"del"])->name("users-del");
    Route::get('/users/', [UsersController::class,"index"])->name('users-index');



    // gestion de activos
    Route::get('/activos/nuevo', [ActivosController::class,"add"])->name("activos-add");
    Route::get('/activos/editar/{id}', [ActivosController::class,"edit"])->name("activos-edit");
    Route::post('/activos/store', [ActivosController::class,"store"])->name("activos-store");
    Route::get('/activos/delete/{id}', [ActivosController::class,"del"])->name("activos-del");
    Route::get('/activos/list', [ActivosController::class,"list"])->name("activos-list");
    Route::get('/activos/', [ActivosController::class,"index"])->name('activos-index');


    // gestion de gastos
    Route::get('/gastos/reporte', [GastosController::class,"reporte"])->name('gastos-reporte');
    Route::get('/gastos/{activo_id}', [GastosController::class,"index"])->name('gastos-index');
    Route::get('/gastos/nuevo/{activo_id}', [GastosController::class,"add"])->name('gastos-add');
    Route::get('/gastos/editar/{id}', [GastosController::class,"edit"])->name('gastos-edit');;
    Route::post('/gastos/store', [GastosController::class,"store"])->name('gastos-store');;
    Route::get('/gastos/delete/{id}', [GastosController::class,"del"])->name('gastos-del');;


    Route::get('/', function () {

        // esta interface se muestra cunado hay una sesion
        return view('home');


    });

}else{
    Route::get('/', function () {
        return view('login');
    });
    Route::post('/ingresar', [UsersController::class,"login"])->name("login");
}


