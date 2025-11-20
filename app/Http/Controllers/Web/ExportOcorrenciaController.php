<?php

namespace App\Http\Controllers\Web;

use App\Exports\OcorrenciaExport;
use App\Http\Controllers\Controller;
use App\Services\OcorrenciaService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportOcorrenciaController extends Controller
{
    public function __construct(public OcorrenciaService $ocorrenciaService)
    {

    }

    public function export(Request $request, $extensao)
    {
        $query = $this->ocorrenciaService->list($request);
        $ocorrencias = $query->get();

        if (in_array($extensao, ['xlsx', 'csv'])) {
            return Excel::download(new OcorrenciaExport($query), 'ocorrencias.' . $extensao);
        } else if($extensao == 'pdf') {
            $pdf = Pdf::loadView('pdf.ocorrencias', compact('ocorrencias'));
            return $pdf->stream('documento.pdf');
        }
    }
}
