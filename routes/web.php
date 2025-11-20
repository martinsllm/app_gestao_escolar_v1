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
    
    Route::prefix('estudantes')->group(function(){
        Route::get('/', [EstudanteController::class, 'index'])->name('estudantes.index'); 
        Route::get('/create', [ImportEstudantesController::class, 'create'])->name('estudantes.create');
        Route::post('/import', [ImportEstudantesController::class, 'import'])->name('import.estudantes');
        Route::get('/export/{id}', [ExportEstudanteController::class, 'export'])->name('export.estudante');
    });

    Route::prefix('ocorrencias')->group(function(){
        Route::get('/', [OcorrenciaController::class, 'index'])->name('ocorrencias.index');
        Route::get('/create', [OcorrenciaController::class, 'create'])->name('ocorrencias.create');
        Route::post('/create', [OcorrenciaController::class, 'store'])->name('ocorrencias.store');
        Route::get('/export/{extensao}', action: [ExportOcorrenciaController::class, 'export'])->name('export.ocorrencias');
    });

    Route::get('/turmas/export/{extensao}/{id}', [ExportTurmaController::class, 'export'])->name('export.turmas');
    
});

require __DIR__.'/auth.php';
