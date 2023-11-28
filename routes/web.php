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

//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//!              BROWSE DE PRESUPUESTOS                                          ! 
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


Route::get('/presup_pendientes', function () {     
    return datatables()->of(DB::table('presupuesto')
    ->join('clientes_proveedores','presupuesto.id_cliente','=','clientes_proveedores.id')
    ->join('tipo_presupuestos','presupuesto.id_tipo_obra','=','tipo_presupuestos.id')
    ->where('presupuesto.estado','=', 'Pendiente')
    ->select([  'presupuesto.id',
                 'tipo_presupuestos.tipo_presupuesto as tipo',
                 'presupuesto.nombre as nombre',
                'presupuesto.fecha',
                'clientes_proveedores.razon_social as cliente',
                'presupuesto.costo_costo as importe_costo',
                'presupuesto.importe_venta as importe_venta',
               ]))
    ->addColumn('check','vendor/voyager/presupuesto/check')
    ->addColumn('accion','vendor/voyager/presupuesto/acciones')
    ->rawColumns(['check','accion'])     
    ->toJson();   
 
 });


 Route::get('/presup_aprobados', function () {     
    return datatables()->of(DB::table('presupuesto')
    ->join('clientes_proveedores','presupuesto.id_cliente','=','clientes_proveedores.id')
    ->join('tipo_presupuestos','presupuesto.id_tipo_obra','=','tipo_presupuestos.id')
    ->where('presupuesto.estado','=', 'Aprobado')
    ->select([  'presupuesto.id',
                 'tipo_presupuestos.tipo_presupuesto as tipo',
                 'presupuesto.nombre as nombre',
                'presupuesto.fecha',
                'clientes_proveedores.razon_social as cliente',
                'presupuesto.costo_costo as importe_costo',
                'presupuesto.importe_venta as importe_venta',
               ]))
    ->addColumn('check','vendor/voyager/presupuesto/check')
    ->addColumn('accion','vendor/voyager/presupuesto/acciones')
    ->rawColumns(['check','accion'])     
    ->toJson();   
 
 });

 
Route::get('/presup_rechazados', function () {     
    return datatables()->of(DB::table('presupuesto')
    ->join('clientes_proveedores','presupuesto.id_cliente','=','clientes_proveedores.id')
    ->join('tipo_presupuestos','presupuesto.id_tipo_obra','=','tipo_presupuestos.id')
    ->where('presupuesto.estado','=', 'Rechazado')
    ->select([  'presupuesto.id',
                 'tipo_presupuestos.tipo_presupuesto as tipo',
                 'presupuesto.nombre as nombre',
                'presupuesto.fecha',
                'clientes_proveedores.razon_social as cliente',
                'presupuesto.costo_costo as importe_costo',
                'presupuesto.importe_venta as importe_venta',
               ]))
    ->addColumn('check','vendor/voyager/presupuesto/check')
    ->addColumn('accion','vendor/voyager/presupuesto/acciones')
    ->rawColumns(['check','accion'])     
    ->toJson();   
 
 });