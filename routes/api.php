<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*===========================
=           clientes           =
=============================*/

Route::apiResource('/clientes', \App\Http\Controllers\API\ClienteController::class);

Route::group([
   'prefix' => 'clientes',
], function() {
    Route::get('{id}/restore', [\App\Http\Controllers\API\ClienteController::class, 'restore']);
    Route::delete('{id}/permanent-delete', [\App\Http\Controllers\API\ClienteController::class, 'permanentDelete']);
});
/*=====  End of clientes   ======*/

/*===========================
=           participantes           =
=============================*/

Route::apiResource('/participantes', \App\Http\Controllers\API\ParticipanteController::class);

Route::group([
   'prefix' => 'participantes',
], function() {
    Route::get('{id}/restore', [\App\Http\Controllers\API\ParticipanteController::class, 'restore']);
    Route::delete('{id}/permanent-delete', [\App\Http\Controllers\API\ParticipanteController::class, 'permanentDelete']);
});
/*=====  End of participantes   ======*/

/*===========================
=           clientes           =
=============================*/

Route::apiResource('/clientes', \App\Http\Controllers\API\ClienteController::class);

Route::group([
   'prefix' => 'clientes',
], function() {
    Route::get('{id}/restore', [\App\Http\Controllers\API\ClienteController::class, 'restore']);
    Route::delete('{id}/permanent-delete', [\App\Http\Controllers\API\ClienteController::class, 'permanentDelete']);
});
/*=====  End of clientes   ======*/

/*===========================
=           ganadors           =
=============================*/

Route::apiResource('/ganadores', \App\Http\Controllers\API\GanadorController::class);

Route::post('/resetear_ganadores', [\App\Http\Controllers\API\GanadorController::class, 'resetearGanadores']);

/*=====  End of ganadors   ======*/
