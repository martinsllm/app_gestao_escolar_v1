<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportRequest;
use App\Models\Estudante;
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

        $separator = ';';

        $arrayValue = [];

        $errors=[];

        foreach ($fileData as $row) {
           $values = explode($separator, $row[0]);

           if(count($values) != count($headers)){
                continue; //Ignora linhas inválidas
           }

           $estudanteData = array_combine($headers, $values);

           //busca id da turma pelo nome
           $turmaId = $this->turmaService->getId($estudanteData['turma']);

           $matriculaExists = $this->estudanteService->findMatricula($estudanteData['matricula']);

           if($matriculaExists){
                $errors[] = $estudanteData['matricula'];
                continue; //Ignora linhas inválidas
           }

           $arrayValue[] = [
                'matricula' => $estudanteData['matricula'],
                'nome_completo'=> $estudanteData['nome_completo'],
                'data_nascimento' => DateTime::createFromFormat('d/m/Y',$estudanteData['data_nascimento']),
                'turma_id' => $turmaId,
                'telefone_responsavel' => $estudanteData['telefone_responsavel'],
                'email' => $estudanteData['email'],
           ];
           
        }

        if (!empty($errors)) {
            return response()->json(['message' => 'Data not imported'], 422);
        }

        $this->estudanteService->insert($arrayValue);

        return response()->json(['message' => 'Data imported successfully'], 200);

        
    }
}
