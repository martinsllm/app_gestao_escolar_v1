<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportRequest;
use App\Jobs\ImportCsvJob;
use App\Traits\ApiResponse;

class ImportEstudantesController extends Controller
{

    use ApiResponse;
    
    public function __construct(){

    }

    public function import(ImportRequest $request){

     $fileName = 'import-' . now()->format('Y-m-d-H-i-s') . '.csv';
        
     $path = $request->file('file')->storeAs('uploads', $fileName);

     ImportCsvJob::dispatchSync($path);

     return $this->response(['message' => 'Data is being imported'], 200); 
    }
}