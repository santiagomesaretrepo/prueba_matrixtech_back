<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//Route::get('/nuevoUsuario', 'mandardatosController@NuevoUsuarios');
Route::post('/nuevoUsuario', [App\Http\Controllers\mandardatosController::class, 'NuevoUsuarios']);
Route::get('/verUsuario', [App\Http\Controllers\mandardatosController::class, 'VerUsuarios']);