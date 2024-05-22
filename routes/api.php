<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EmpresaApiController;
use App\Http\Controllers\Api\CuotaApiController;
use App\Http\Controllers\Api\OficinaApiController;
use App\Http\Controllers\Api\TicketApiController;
use App\Http\Controllers\Api\CategoriaApiController;
use App\Http\Controllers\Api\ImagenApiController;
use App\Http\Controllers\Api\ReservaApiController;
use App\Http\Controllers\Api\SalaApiController;

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

Route::apiResource('empresas', EmpresaApiController::class);
Route::apiResource('cuotas', CuotaApiController::class);
Route::apiResource('oficinas', OficinaApiController::class);
Route::apiResource('tickets', TicketApiController::class);
Route::apiResource('categorias', CategoriaApiController::class);
Route::apiResource('reserva', ReservaApiController::class);
Route::apiResource('salas', SalaApiController::class);
Route::apiResource('imagenes', ImagenApiController::class);