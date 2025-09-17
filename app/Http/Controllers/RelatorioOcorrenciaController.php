<?php

namespace App\Http\Controllers;

use App\Exports\OcorrenciaExport;
use App\Services\OcorrenciaService;
use Maatwebsite\Excel\Facades\Excel;

class RelatorioOcorrenciaController extends Controller
{
    public function __construct(public OcorrenciaService $ocorrenciaService)
    {

    }

    public function export($extensao)
    {
        if (in_array($extensao, ['xlsx', 'csv'])) {
            return Excel::download(new OcorrenciaExport($this->ocorrenciaService), 'ocorrencias.' . $extensao);
        }

        return redirect('/');
    }
}
