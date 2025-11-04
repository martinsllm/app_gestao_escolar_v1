<?php

use App\Http\Controllers\EstudanteController;
use App\Http\Controllers\ExportEstudanteController;
use App\Http\Controllers\ExportOcorrenciaController;
use App\Http\Controllers\ExportTurmaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::apiResource('estudantes', EstudanteController::class);
    Route::get('/export/ocorrencias/{extensao}', [ExportOcorrenciaController::class, 'export'])->name('export.ocorrencias');
    Route::get('/export/turmas/{extensao}/{id}', [ExportTurmaController::class, 'export'])->name('export.turmas');
    Route::get('/export/estudante/{id}', [ExportEstudanteController::class, 'export'])->name('export.estudante');
});

require __DIR__.'/auth.php';
