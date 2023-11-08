<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//!              RUTAS DE ITEMS TECNICOS                                         ! 
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

Route::get('insumo_elegir', 'App\Http\Controllers\voyager\ItemController@insumo_elegir');
Route::get('modal_item_elegir', 'App\Http\Controllers\voyager\PresupuestoController@ModalItem_elegir');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
