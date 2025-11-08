<?php

use App\Http\Controllers\Web\EstudanteController;
use App\Http\Controllers\Web\ExportEstudanteController;
use App\Http\Controllers\Web\ExportOcorrenciaController;
use App\Http\Controllers\Web\ExportTurmaController;
use App\Http\Controllers\Web\ImportEstudantesController;
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
    Route::get('/estudantes/import', [ImportEstudantesController::class, 'create'])->name('estudantes.import');
    Route::post('/import/estudantes', [ImportEstudantesController::class, 'import'])->name('import.estudantes');
    Route::get('/export/ocorrencias/{extensao}', action: [ExportOcorrenciaController::class, 'export'])->name('export.ocorrencias');
    Route::get('/export/turmas/{extensao}/{id}', [ExportTurmaController::class, 'export'])->name('export.turmas');
    Route::get('/export/estudante/{id}', [ExportEstudanteController::class, 'export'])->name('export.estudante');
});

require __DIR__.'/auth.php';
