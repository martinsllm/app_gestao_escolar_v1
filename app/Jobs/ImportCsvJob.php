<?php

namespace App\Jobs;

use App\Models\Estudante;
use App\Models\Turma;
use DateTime;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use League\Csv\Reader;
use League\Csv\Statement;

class ImportCsvJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(protected $path)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $filepath = storage_path("app/private/" . $this->path);

        if(!file_exists($filepath)){
            return;
        }

        $csv = Reader::createFromPath($filepath, 'r');

        $csv->setDelimiter(';');

        $csv->setHeaderOffset(0);

        $records = (new Statement())->process($csv);

        $batchInsert = [];

        foreach($records as $record){
            $matricula = $record['matricula'] ?? null;

            if(Estudante::where('matricula', $matricula)->exists()){
                continue; //ignora a linha
            }

            $turma = Turma::where('codigo', $record['turma'])->first();

            if(!$turma){
                continue; //ignora a linha
            }

            $batchInsert[] = [
                'matricula' => $record['matricula'],
                'nome_completo'=> $record['nome_completo'],
                'data_nascimento' => DateTime::createFromFormat('d/m/Y',$record['data_nascimento']),
                'turma_id' => $turma->id,
                'telefone_responsavel' => $record['telefone_responsavel'],
                'email' => $record['email'],
                'created_at' => now(),
                'updated_at' => now()
            ];

            if(count($batchInsert) >= 50){
                Estudante::insert($batchInsert);
                $batchInsert = [];
            }
        }

        if(!empty($batchInsert)){
            Estudante::insert($batchInsert);
            $batchInsert = [];
        }
    }
}
