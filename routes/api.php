<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

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

Route::resource('nodemcu', ControladorNodeMCU::class);
Route::resource('sensores', ControladorSensores::class);
                                                                                                                                                                                                                                                                                    
Route::group(['middleware' => ['auth']], function()
{
	Route::resource('usuarios', ControladorUsuario::class);
});

Route::prefix('sesion')->group(function()
{
	Route::post('cuenta', 'ControladorSesion@cuenta');
	Route::post('ingresar', 'ControladorSesion@ingresar');
	Route::post('salir', 'ControladorSesion@salir');
	Route::post('registrarse', 'ControladorSesion@registrarse');
	Route::post('refrescar', 'ControladorSesion@refrescar');
});

Route::any('no_autorizado', function()
{
	return response()->json(['error' => 'No Autorizado'], Response::HTTP_UNAUTHORIZED);
})
->name('no_autorizado');