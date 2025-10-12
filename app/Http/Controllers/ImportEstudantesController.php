<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportRequest;
use App\Services\EstudanteService;
use App\Services\TurmaService;
use DateTime;

class ImportEstudantesController extends Controller
{
    public function __construct(public EstudanteService $estudanteService,public TurmaService $turmaService){

    }

    public function import(ImportRequest $request){
        $headers = ['matricula', 'nome_completo', 'data_nascimento', 'telefone_responsavel', 'email', 'turma'];

        $fileData = array_map('str_getcsv', file($request->file('file')));

        $arrayValue = [];

        $errors=[];

        foreach ($fileData as $row) {
           $values = explode(';', $row[0]);

           if(count($values) != count($headers)){
                continue; //Ignora linhas inválidas
           }

           $data = array_combine($headers, $values);

           //verifica se turma informada existe
           $turma = $this->turmaService->findByCodigo($data['turma']);

           if(!$turma){
                $errors[] = $data['turma'];
                continue; //Ignora linhas inválidas
           }

           $matriculaExists = $this->estudanteService->findMatricula($data['matricula']);

           if($matriculaExists){
                $errors[] = $data['matricula'];
                continue; //Ignora linhas inválidas
           }

           $arrayValue[] = [
                'matricula' => $data['matricula'],
                'nome_completo'=> $data['nome_completo'],
                'data_nascimento' => DateTime::createFromFormat('d/m/Y',$data['data_nascimento']),
                'turma_id' => $turma->id,
                'telefone_responsavel' => $data['telefone_responsavel'],
                'email' => $data['email'],
           ];
           
        }

        if (!empty($errors)) {
            return response()->json(['message' => 'Data not imported'], 422);
        }

        $this->estudanteService->insertCsv($arrayValue);

        return response()->json(['message' => 'Data imported successfully'], 200); 
    }
}