<?php

use App\Http\Controllers\ApuestaController;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\CuotasController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\LigaController;
use App\Http\Controllers\PartidoController;
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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(LoginRegisterController::class)->group(function () {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
    Route::post('/logout','logout');
    Route::get('/users', [LoginRegisterController::class, 'show']);

});

Route::get('/partidos/this-week', [PartidoController::class, 'matchesThisWeek']);
Route::get('/partidos/today', [PartidoController::class, 'matchesToday']);
Route::get('/apuestas/usuario/{id}', [ApuestaController::class, 'obtenerApuestasPorUsuario']);



Route::controller('ligas', LigaController::class);
Route::apiResource('cuotas', CuotasController::class);
Route::apiResource('ligas', LigaController::class);
Route::apiResource('partidos', PartidoController::class);
Route::apiResource('equipos', EquipoController::class);
Route::apiResource('apuestas', ApuestaController::class);


Route::get('/apuesta/{apuesta_id}', [ApuestaController::class,'Find']);
Route::get('/cuotas/{cuota_id}', [CuotasController::class,'Find']);
Route::get('/liga/{liga_id}', [LigaController::class,'Find']);
Route::get('/partido/{partido_id}', [PartidoController::class,'Find']);
Route::get('/equipo/{equipo_id}', [EquipoController::class,'Find']);
// Route::post('apuesta/create/{apuesta}',[ApuestaController::class,'create']);
Route::get('/partidos/{partido}/cuotas', [PartidoController::class, 'getCuotasForPartido']);



