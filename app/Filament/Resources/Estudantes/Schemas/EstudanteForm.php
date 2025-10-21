<?php

namespace App\Filament\Resources\Estudantes\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class EstudanteForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('matricula')
                    ->required()
                    ->unique()
                    ->rules('numeric'),
                TextInput::make('nome_completo')
                    ->required(),
                DatePicker::make('data_nascimento')
                    ->required(),
                TextInput::make('telefone_responsavel')
                    ->mask('(99) 99999-9999')
                    ->required(),
                TextInput::make('email')
                    ->email()
                    ->required(),
                Select::make('turma_id')
                    ->relationship('turma', 'codigo')
                    ->required(),
            ]);
    }
}
