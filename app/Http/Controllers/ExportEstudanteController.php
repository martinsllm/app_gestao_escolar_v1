<?php

namespace App\Http\Controllers;

use App\Services\EstudanteService;
use Barryvdh\DomPDF\Facade\Pdf;

class ExportEstudanteController extends Controller
{
    public function __construct(public EstudanteService $estudanteService){}

    public function export(string $id){
        $estudante = $this->estudanteService->findByPk($id);
        $pdf = Pdf::loadView('pdf.estudante', compact('estudante'));
        return $pdf->stream('documento.pdf');
    }
}
