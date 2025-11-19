<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\OcorrenciaRequest;
use App\Services\MedidaService;
use App\Services\OcorrenciaService;
use Illuminate\Http\Request;

class OcorrenciaController extends Controller
{
    public function __construct(public OcorrenciaService $ocorrenciaService, public MedidaService $medidaService)
    {

    }

    public function index(Request $request)
    {
        $query = $this->ocorrenciaService->list($request);

        $result = $query->paginate(5);

        $medidas = $this->medidaService->list();

        return view('pages.ocorrencias.index', compact('result', 'medidas'));
    }

    public function create(Request $request){
        $medidas = $this->medidaService->list();
        return view('pages.ocorrencias.create', compact('medidas'));
    }

    public function store(OcorrenciaRequest $request){
        $this->ocorrenciaService->store($request->all());
        return redirect()->route('ocorrencias.index');
    }
}