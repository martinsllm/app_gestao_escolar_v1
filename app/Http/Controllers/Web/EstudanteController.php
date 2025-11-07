<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\EstudanteService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class EstudanteController extends Controller
{

    use ApiResponse;

    public function __construct(public EstudanteService $estudanteService)
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $this->estudanteService->list($request);

        $result = $query->paginate(5);

        return view('pages.estudantes.index', compact('result'));
    }

    
}
