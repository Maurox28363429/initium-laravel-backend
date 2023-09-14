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
Route::post('login', 'App\Http\Controllers\UserController@authenticate');
Route::get('auth', 'App\Http\Controllers\UserController@getAuthenticatedUser');
Route::get('refreshtoken', 'App\Http\Controllers\UserController@refreshtoken');
Route::post('getRecovery', 'App\Http\Controllers\UserController@getRecovery');
Route::post('validateRecovery', 'App\Http\Controllers\UserController@validateRecovery');
Route::post('putRecovery', 'App\Http\Controllers\UserController@putRecovery');
//roles
Route::get('roles', 'App\Http\Controllers\RolesController@index');
Route::get('roles/{id}', 'App\Http\Controllers\RolesController@show');
//Route::put('roles/{id}', 'App\Http\Controllers\RolesController@update');
//Route::post('roles', 'App\Http\Controllers\RolesController@store');
//Route::delete('roles/{id}', 'App\Http\Controllers\RolesController@delete');

Route::group(['middleware' => ['jwt.verify']], function () {
    //roles auth
    Route::put('roles/{id}', 'App\Http\Controllers\RolesController@update');
    Route::post('roles', 'App\Http\Controllers\RolesController@store');
    Route::delete('roles/{id}', 'App\Http\Controllers\RolesController@delete');
    //user
    Route::get('users', 'App\Http\Controllers\UserController@index');
    Route::get('misEdificios', 'App\Http\Controllers\UserController@misEdificios');
    Route::get('misDepartamentos', 'App\Http\Controllers\UserController@misDepartamentos');

    Route::get('adminMisEdificios', 'App\Http\Controllers\UserController@adminMisEdificios');

    Route::get('users/{id}', 'App\Http\Controllers\UserController@show');
    Route::put('users/{id}', 'App\Http\Controllers\UserController@update');
    Route::post('users/{id}', 'App\Http\Controllers\UserController@update');
    Route::post('users_asignar_masive', 'App\Http\Controllers\UserController@masiveAsignacion');
    Route::delete('users/{id}', 'App\Http\Controllers\UserController@delete');
    //Edificios
    Route::put('edificios/{id}', 'App\Http\Controllers\EdificiosController@update');
    Route::post('edificios', 'App\Http\Controllers\EdificiosController@store');
    Route::delete('edificios/{id}', 'App\Http\Controllers\EdificiosController@delete');
    //Formas de pago
    Route::put('method_payment/{id}', 'App\Http\Controllers\FormasPagoController@update');
    Route::post('method_payment/{id}', 'App\Http\Controllers\FormasPagoController@update');
    Route::post('method_payment', 'App\Http\Controllers\FormasPagoController@store');
    Route::delete('method_payment/{id}', 'App\Http\Controllers\FormasPagoController@delete');
    //Propiedades
    Route::put('propiedades/{id}', 'App\Http\Controllers\PropiedadesController@update');
    Route::post('propiedades', 'App\Http\Controllers\PropiedadesController@store');
    Route::delete('propiedades/{id}', 'App\Http\Controllers\PropiedadesController@delete');
    //Noticias
    Route::post('noticias/{id}', 'App\Http\Controllers\NoticiasController@update');
    Route::post('noticias', 'App\Http\Controllers\NoticiasController@store');
    Route::delete('noticias/{id}', 'App\Http\Controllers\NoticiasController@delete');
    //Departamentos
    Route::post('departamentos/{id}', 'App\Http\Controllers\DepartamentosController@update');
    Route::post('departamentos', 'App\Http\Controllers\DepartamentosController@store');
    Route::post('departamentos_masive', 'App\Http\Controllers\DepartamentosController@generateMasive');
    Route::delete('departamentos/{id}', 'App\Http\Controllers\DepartamentosController@delete');
    Route::delete('departamentos_masive_delete', 'App\Http\Controllers\DepartamentosController@deleteByEdificio');
    //Ordenes
    Route::put('ordenes/{id}', 'App\Http\Controllers\OrderController@update');
    Route::post('ordenes', 'App\Http\Controllers\OrderController@store');
    Route::delete('ordenes/{id}', 'App\Http\Controllers\OrderController@delete');
    //Payments
    Route::put('payment/{id}', 'App\Http\Controllers\PaymentController@update');
    Route::post('payment', 'App\Http\Controllers\PaymentController@store');
    Route::delete('payment/{id}', 'App\Http\Controllers\PaymentController@delete');
    //visitas
    Route::put('visitas/{id}', 'App\Http\Controllers\VisitasController@update');
    Route::post('visitas', 'App\Http\Controllers\VisitasController@store');
    Route::delete('visitas/{id}', 'App\Http\Controllers\VisitasController@delete');
    //Votaciones
    Route::put('votaciones/{id}', 'App\Http\Controllers\VotacionesController@update');
    Route::post('votaciones', 'App\Http\Controllers\VotacionesController@store');
    Route::delete('votaciones/{id}', 'App\Http\Controllers\VotacionesController@delete');
    //Voto
    Route::put('voto/{id}', 'App\Http\Controllers\VotoController@update');
    Route::post('voto', 'App\Http\Controllers\VotoController@store');
    Route::delete('voto/{id}', 'App\Http\Controllers\VotoController@delete');
    //Servicios
    Route::put('servicios/{id}', 'App\Http\Controllers\ServiciosController@update');
    Route::post('servicios', 'App\Http\Controllers\ServiciosController@store');
    Route::delete('servicios/{id}', 'App\Http\Controllers\ServiciosController@delete');
    //Reservacion
    Route::put('reservaciones/{id}', 'App\Http\Controllers\ReservationController@update');
    Route::post('reservaciones', 'App\Http\Controllers\ReservationController@store');
    Route::delete('reservaciones/{id}', 'App\Http\Controllers\ReservationController@delete');

    //inquilinos
    Route::get('inquilinos', 'App\Http\Controllers\InquilinosController@index');
    Route::get('inquilinos/{id}', 'App\Http\Controllers\InquilinosController@show');
    Route::put('inquilinos/{id}', 'App\Http\Controllers\InquilinosController@update');
    Route::post('inquilinos', 'App\Http\Controllers\InquilinosController@store');
    Route::delete('inquilinos/{id}', 'App\Http\Controllers\InquilinosController@delete');
    //ModulovotacionesVotosController
    Route::get('modulovotaciones-votos', 'App\Http\Controllers\ModulovotacionesVotosController@index');
    Route::get('modulovotaciones-votos/{id}', 'App\Http\Controllers\ModulovotacionesVotosController@show');
    Route::put('modulovotaciones-votos/{id}', 'App\Http\Controllers\ModulovotacionesVotosController@update');
    Route::post('modulovotaciones-votos/{id}', 'App\Http\Controllers\ModulovotacionesVotosController@update');
    Route::post('modulovotaciones-votos', 'App\Http\Controllers\ModulovotacionesVotosController@store');
    Route::delete('modulovotaciones-votos/{id}', 'App\Http\Controllers\ModulovotacionesVotosController@delete');
    //ModulovotacionesController
    Route::get('modulovotaciones', 'App\Http\Controllers\ModulovotacionesController@index');
    Route::get('modulovotaciones/{id}', 'App\Http\Controllers\ModulovotacionesController@show');
    Route::put('modulovotaciones/{id}', 'App\Http\Controllers\ModulovotacionesController@update');
    Route::put('modulovotaciones/{id}', 'App\Http\Controllers\ModulovotacionesController@update');
    Route::post('modulovotaciones', 'App\Http\Controllers\ModulovotacionesController@store');
    Route::delete('modulovotaciones/{id}', 'App\Http\Controllers\ModulovotacionesController@delete');

});

//Edificios
Route::get('edificios', 'App\Http\Controllers\EdificiosController@index');
Route::get('edificios/{id}', 'App\Http\Controllers\EdificiosController@show');

//Formas de pago
Route::get('method_payment', 'App\Http\Controllers\FormasPagoController@index');
Route::get('method_payment/{id}', 'App\Http\Controllers\FormasPagoController@show');

//Propiedades
Route::get('propiedades', 'App\Http\Controllers\PropiedadesController@index');
Route::get('propiedades/{id}', 'App\Http\Controllers\PropiedadesController@show');

//Noticias
Route::get('noticias', 'App\Http\Controllers\NoticiasController@index');
Route::get('noticias/{id}', 'App\Http\Controllers\NoticiasController@show');

//Departamentos
Route::get('departamentos', 'App\Http\Controllers\DepartamentosController@index');
Route::get('departamentos/{id}', 'App\Http\Controllers\DepartamentosController@show');

//Ordenes
Route::get('ordenes', 'App\Http\Controllers\OrderController@index');
Route::get('ordenes/{id}', 'App\Http\Controllers\OrderController@show');

//payment
Route::get('payment', 'App\Http\Controllers\PaymentController@index');
Route::get('payment/{id}', 'App\Http\Controllers\PaymentController@show');

//visitas
Route::get('visitas', 'App\Http\Controllers\VisitasController@index');
Route::get('visitas/{id}', 'App\Http\Controllers\VisitasController@show');


//Votaciones
Route::get('votaciones', 'App\Http\Controllers\VotacionesController@index');
Route::get('votaciones/{id}', 'App\Http\Controllers\VotacionesController@show');


//Voto
Route::get('voto', 'App\Http\Controllers\VotoController@index');
Route::get('voto/{id}', 'App\Http\Controllers\VotoController@show');

//Servicios
Route::get('servicios', 'App\Http\Controllers\ServiciosController@index');
Route::get('servicios/{id}', 'App\Http\Controllers\ServiciosController@show');

//Reservacion
Route::get('reservaciones', 'App\Http\Controllers\ReservationController@index');
Route::get('reservaciones/{id}', 'App\Http\Controllers\ReservationController@show');
