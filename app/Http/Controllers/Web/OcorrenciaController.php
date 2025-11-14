<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\OcorrenciaService;
use Illuminate\Http\Request;

class OcorrenciaController extends Controller
{
    public function __construct(public OcorrenciaService $ocorrenciaService)
    {

    }

    public function index(Request $request)
    {
        $query = $this->ocorrenciaService->list($request);

        $result = $query->paginate(5);

        return view('pages.ocorrencias.index', compact('result'));
    }
}