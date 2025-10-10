<?php

namespace App\Http\Controllers;

use App\Exports\OcorrenciaExport;
use App\Services\OcorrenciaService;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class ExportOcorrenciaController extends Controller
{
    public function __construct(public OcorrenciaService $ocorrenciaService)
    {

    }

    public function export($extensao)
    {
        if (in_array($extensao, ['xlsx', 'csv'])) {
            return Excel::download(new OcorrenciaExport($this->ocorrenciaService), 'ocorrencias.' . $extensao);
        } else if($extensao == 'pdf') {
            $ocorrencias = $this->ocorrenciaService->listAll();
            $pdf = Pdf::loadView('pdf.ocorrencias', compact('ocorrencias'));
            return $pdf->stream('documento.pdf');
        }
    }
}
