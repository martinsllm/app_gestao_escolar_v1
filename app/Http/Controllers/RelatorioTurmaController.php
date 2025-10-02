<?php

namespace App\Http\Controllers;

use App\Exports\TurmaExport;
use App\Services\TurmaService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class RelatorioTurmaController extends Controller
{
    public function __construct(public TurmaService $turmaService){

    }

    public function export($extensao, string $id){
        if(in_array($extensao, ['xlsx', 'csv'])){
            return Excel::download(new TurmaExport($this->turmaService, $id),'turma.' . $extensao);
        }
    }
}
