<?php

namespace App\Exports;

use App\Services\TurmaService;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TurmaExport implements FromCollection, WithMapping, WithHeadings
{
     public function __construct(public TurmaService $turmaService, public string $id)
    {
    }
    
    public function collection()
    {
        return $this->turmaService->findByPk($this->id)->estudantes;
    }

    public function headings(): array
    {
        return [
            'Matrícula',
            'Nome Completo',
            'Data de Nascimento'
        ];
    }

    public function map($turma): array
    {
        return [
           $turma->matricula,
           $turma->nome_completo,
           $turma->data_nascimento->format('d/m/Y')
        ];
    }
}
