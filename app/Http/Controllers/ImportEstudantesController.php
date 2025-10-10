<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportRequest;
use App\Services\EstudanteService;

class ImportEstudantesController extends Controller
{
    public function __construct(public EstudanteService $estudanteService){

    }

    public function import(ImportRequest $request){
        dd("teste");
    }
}
