<?php

namespace App\Http\Controllers;

use App\Exports\TurmaExport;
use App\Services\TurmaService;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class ExportTurmaController extends Controller
{
    public function __construct(public TurmaService $turmaService){

    }

    public function export($extensao, string $id){
        if(in_array($extensao, ['xlsx', 'csv'])){
            return Excel::download(new TurmaExport($this->turmaService, $id),'turma.' . $extensao);
        } else if($extensao == 'pdf') {
            $turma = $this->turmaService->findByPk($id);
            $pdf = Pdf::loadView('pdf.turmas', compact('turma'));
            return $pdf->stream('documento.pdf');
        }
    }
}
