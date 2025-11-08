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

        ImportCsvJob::dispatchSync($path);

        return back()->with('message', 'File uploaded successfully!');
     } catch (Exception $e) {
        return back()->with('message', 'File upload failed!');
     }
    }
}