<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImportRequest;
use App\Jobs\ImportCsvJob;
use Exception;

class ImportEstudantesController extends Controller
{
    public function __construct(){

    }

    public function create(){
        return view('pages.estudantes.import');
    }

    public function import(ImportRequest $request){

     try {
        $fileName = 'import-' . now()->format('Y-m-d-H-i-s') . '.csv';
        
        $path = $request->file('file')->storeAs('uploads', $fileName);

        $job = new ImportCsvJob($path);

        $job->handle();

        $errors = $job->getErrors();

        if(!empty($errors)){
            return back()->withErrors($errors)->withInput();
        }

        return back()->with('message', 'Arquivo importado com sucesso!');
     } catch (Exception $e) {
        return back()->with('message', 'Falha ao importar o arquivo!');
     }
    }
}