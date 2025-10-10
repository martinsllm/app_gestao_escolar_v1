<?php

use App\Http\Controllers\ExportEstudanteController;
use App\Http\Controllers\ExportOcorrenciaController;
use App\Http\Controllers\ExportTurmaController;
use App\Http\Controllers\ImportEstudantesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/export/ocorrencias/{extensao}', [ExportOcorrenciaController::class, 'export'])->name('export.ocorrencias');
    Route::get('/export/turmas/{extensao}/{id}', [ExportTurmaController::class, 'export'])->name('export.turmas');
    Route::get('/export/estudante/{extensao}/{id}', [ExportEstudanteController::class, 'export'])->name('export.estudante');
    Route::post('/import/estudantes', [ImportEstudantesController::class, 'import'])->name('import.estudantes');
});

require __DIR__.'/auth.php';
