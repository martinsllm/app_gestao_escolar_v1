<?php

namespace App\Exports;


use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class OcorrenciaExport implements FromCollection, WithHeadings, WithMapping
{
    public function __construct(public Builder $query)
    {
        $this->query = $query;
    }

    public function collection()
    {
        return $this->query->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Descrição',
            'Estudante',
            'Turma',
            'Medidas',
            'Criado em',
            'Atualizado em',
        ];
    }

    public function map($ocorrencia): array
    {
        return [
            $ocorrencia->id,
            $ocorrencia->descricao,
            $ocorrencia->estudante->nome_completo,
            $ocorrencia->estudante->turma->codigo,
            $ocorrencia->medida->descricao,
            $ocorrencia->created_at->format('d/m/Y H:i:s'),
            $ocorrencia->updated_at->format('d/m/Y H:i:s'),
        ];
    }
}
