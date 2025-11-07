<?php
use App\Http\Controllers\Api\EstudanteControllerApi;
use App\Http\Controllers\Api\OcorrenciaControllerApi;
use App\Http\Controllers\Api\MedidaControllerApi;
use App\Http\Controllers\Api\TurmaControllerApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {
    Route::apiResource('estudantes', EstudanteControllerApi::class);
    Route::apiResource('turmas', TurmaControllerApi::class);
    Route::apiResource('ocorrencias', OcorrenciaControllerApi::class);
    Route::apiResource('medidas', MedidaControllerApi::class);
});

