<?php

namespace App\Filament\Resources\Ocorrencias\Schemas;

use App\Filament\Tables\EstudantesTable;
use Filament\Forms\Components\ModalTableSelect;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class OcorrenciaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('descricao')
                    ->required(),
                ModalTableSelect::make('estudante_id')
                    ->relationship('estudante', 'nome_completo')
                    ->tableConfiguration(EstudantesTable::class)
                    ->required(),
                Select::make('medida_id')
                    ->relationship('medida', 'descricao')
                    ->required(),
            ]);
    }
}
