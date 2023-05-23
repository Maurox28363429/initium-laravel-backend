<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Row;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//auth
Route::post('register', 'App\Http\Controllers\UserController@register');

Route::post('inscribir','App\Http\Controllers\UserController@inscribir');

Route::post('login', 'App\Http\Controllers\UserController@authenticate');
Route::post('login_participante', 'App\Http\Controllers\UserController@authenticate_participante');

Route::get('auth', 'App\Http\Controllers\UserController@getAuthenticatedUser');
Route::post('getRecovery', 'App\Http\Controllers\UserController@getRecovery');
Route::post('validateRecovery', 'App\Http\Controllers\UserController@validateRecovery');
Route::post('putRecovery', 'App\Http\Controllers\UserController@putRecovery');
//user
Route::get('users', 'App\Http\Controllers\UserController@index');
Route::get('user/{id}', 'App\Http\Controllers\UserController@show');
Route::put('user/{id}', 'App\Http\Controllers\UserController@update');
Route::delete('user/{id}', 'App\Http\Controllers\UserController@delete');
//Etapas CRUD
Route::get('etapas', 'App\Http\Controllers\EtapasController@index');
Route::get('etapa/{id}', 'App\Http\Controllers\EtapasController@show');
Route::post('etapas', 'App\Http\Controllers\EtapasController@store');
Route::put('etapa/{id}', 'App\Http\Controllers\EtapasController@update');
Route::delete('etapa/{id}', 'App\Http\Controllers\EtapasController@delete');
//Cursos CRUD
Route::get('cursos', 'App\Http\Controllers\CursosController@index');
Route::get('curso/{id}', 'App\Http\Controllers\CursosController@show');
Route::post('curso', 'App\Http\Controllers\CursosController@store');
Route::put('curso/{id}', 'App\Http\Controllers\CursosController@update');
Route::delete('curso/{id}', 'App\Http\Controllers\CursosController@delete');
//Clientes CRUD
Route::get('clientes', 'App\Http\Controllers\ClientesController@index');
Route::get('cliente/{id}', 'App\Http\Controllers\ClientesController@show');
Route::get('cliente_by_user/{id}', 'App\Http\Controllers\ClientesController@show_by_user');
Route::post('clientes', 'App\Http\Controllers\ClientesController@store');
Route::post('clientes_public_form', 'App\Http\Controllers\ClientesController@clientes_public_form');
Route::put('cliente/{id}', 'App\Http\Controllers\ClientesController@update');
Route::delete('cliente/{id}', 'App\Http\Controllers\ClientesController@delete');
Route::post('clientes/pase', "App\Http\Controllers\ClientesController@pase_de_estudiantes");
Route::post('clientes_form', "App\Http\Controllers\ClientesController@register");

Route::get('clientes_excel_export', "App\Http\Controllers\ClientesController@clientes_excel_export");
Route::get('asistencia_excel_export', "App\Http\Controllers\ClientesController@asistencia_excel_export");
Route::get('promocion_excel_export', "App\Http\Controllers\ClientesController@promocion_excel_export");

//Noti CRUD
Route::get('notis', 'App\Http\Controllers\NotifyController@index');
Route::get('noti/{id}', 'App\Http\Controllers\NotifyController@show');
Route::post('notis', 'App\Http\Controllers\NotifyController@store');
Route::put('noti/{id}', 'App\Http\Controllers\NotifyController@update');
Route::delete('noti/{id}', 'App\Http\Controllers\NotifyController@delete');
//Planes de pago CRUD
Route::get('planes_pago', 'App\Http\Controllers\PaymentsController@index');
Route::get('planes_pago/{id}', 'App\Http\Controllers\PaymentsController@show');
Route::post('planes_pago', 'App\Http\Controllers\PaymentsController@store');
Route::put('planes_pago/{id}', 'App\Http\Controllers\PaymentsController@update');
Route::delete('planes_pago/{id}', 'App\Http\Controllers\PaymentsController@delete');
//Orders CRUD
Route::get('admin-orders', 'App\Http\Controllers\OrderController@index');
Route::get('admin-order/{id}', 'App\Http\Controllers\OrderController@show');
Route::post('admin-orders', 'App\Http\Controllers\OrderController@store');
Route::put('admin-order/{id}', 'App\Http\Controllers\OrderController@update');
Route::delete('admin-order/{id}', 'App\Http\Controllers\OrderController@delete');
//Payment CRUD
Route::get('payments', 'App\Http\Controllers\PaymentsController@index');
Route::get('payment/{id}', 'App\Http\Controllers\PaymentsController@show');
Route::post('payments', 'App\Http\Controllers\PaymentsController@store');
Route::put('payment/{id}', 'App\Http\Controllers\PaymentsController@update');
Route::delete('payment/{id}', 'App\Http\Controllers\PaymentsController@delete');
//Roles
Route::get('roles', 'App\Http\Controllers\RolesController@index');
Route::get('role/{id}', 'App\Http\Controllers\RolesController@show');
Route::post('roles', 'App\Http\Controllers\RolesController@store');
Route::put('role/{id}', 'App\Http\Controllers\RolesController@update');
Route::delete('role/{id}', 'App\Http\Controllers\RolesController@delete');
//Asistencia CRUD
Route::get('assist', 'App\Http\Controllers\AsistenciaCursoController@index');
Route::get('assist/{id}', 'App\Http\Controllers\AsistenciaCursoController@show');
Route::post('assist', 'App\Http\Controllers\AsistenciaCursoController@store');
Route::put('assist/{id}', 'App\Http\Controllers\AsistenciaCursoController@update');
Route::delete('assist/{id}', 'App\Http\Controllers\AsistenciaCursoController@delete');
Route::get('assist_export', 'App\Http\Controllers\ClientesController@export_asistencia');
//Llego studiante CRUD
Route::get('llego', 'App\Http\Controllers\DiasCursoClienteController@index');
Route::get('llego/{id}', 'App\Http\Controllers\DiasCursoClienteController@show');
Route::post('llego', 'App\Http\Controllers\DiasCursoClienteController@store');
Route::put('llego/{id}', 'App\Http\Controllers\DiasCursoClienteController@update');
Route::delete('llego/{id}', 'App\Http\Controllers\DiasCursoClienteController@delete');

Route::group(['middleware' => ['jwt.verify']], function() {
       /*AÑADE AQUI LAS RUTAS QUE QUIERAS PROTEGER CON JWT*/
 });
//wordpress
Route::get('orders', 'App\Http\Controllers\WordpressController@orders');
Route::get('products', 'App\Http\Controllers\WordpressController@products');
Route::get('contratos', 'App\Http\Controllers\WordpressController@contratos');

Route::get('dash', 'App\Http\Controllers\DashboardController@index');

// use Maatwebsite\Excel\Facades\Excel;
// Route::post('importar_estudiantes', function(Request $request){
//        Excel::load($request->file('excel'), function ($reader) {
//               return response()->json($reader);
//        });
// });
Route::get('lider', 'App\Http\Controllers\ClientesController@lider');
Route::get('companeros', 'App\Http\Controllers\ClientesController@companeros');

Route::post('importar_estudiantes','App\Http\Controllers\ClientesController@import_estudiantes');
