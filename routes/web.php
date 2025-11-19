<?php

use App\Http\Controllers\Web\EstudanteController;
use App\Http\Controllers\Web\ExportEstudanteController;
use App\Http\Controllers\Web\ExportOcorrenciaController;
use App\Http\Controllers\Web\ExportTurmaController;
use App\Http\Controllers\Web\ImportEstudantesController;
use App\Http\Controllers\Web\OcorrenciaController;
use App\Http\Controllers\Web\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('estudantes', [EstudanteController::class, 'index'])->name('estudantes.index'); 
    Route::get('/ocorrencias', [OcorrenciaController::class, 'index'])->name('ocorrencias.index');
    Route::get('/ocorrencias/create', [OcorrenciaController::class, 'create'])->name('ocorrencias.create');
    Route::post('/ocorrencias/create', [OcorrenciaController::class, 'store'])->name('ocorrencias.store');
    Route::get('/estudantes/create', [ImportEstudantesController::class, 'create'])->name('estudantes.create');
    Route::post('/estudantes/import', [ImportEstudantesController::class, 'import'])->name('import.estudantes');
    Route::get('/ocorrencias/export/{extensao}', action: [ExportOcorrenciaController::class, 'export'])->name('export.ocorrencias');
    Route::get('/turmas/export/{extensao}/{id}', [ExportTurmaController::class, 'export'])->name('export.turmas');
    Route::get('/estudante/export/{id}', [ExportEstudanteController::class, 'export'])->name('export.estudante');
});

require __DIR__.'/auth.php';
