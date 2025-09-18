<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EstudanteController;
use App\Http\Controllers\MedidaController;
use App\Http\Controllers\OcorrenciaController;
use App\Http\Controllers\RelatorioOcorrenciaController;
use App\Http\Controllers\TurmaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::prefix('v1')->middleware('auth:sanctum')->group(function () {
    Route::apiResource('turmas', TurmaController::class);
    Route::apiResource('estudantes', EstudanteController::class);
    Route::apiResource('ocorrencias', OcorrenciaController::class);
    Route::apiResource('medidas', MedidaController::class);

    Route::get('/export/ocorrencias/{extensao}', [RelatorioOcorrenciaController::class, 'export']);

    Route::get('/ocorrencias/export/pdf', [RelatorioOcorrenciaController::class, 'exportPDF']);
});

