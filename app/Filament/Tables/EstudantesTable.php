<?php

namespace App\Filament\Tables;

use App\Models\Estudante;
use Filament\Actions\BulkActionGroup;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class EstudantesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => Estudante::query())
            ->columns([
                TextColumn::make('matricula')
                    ->searchable(),
                TextColumn::make('nome_completo')
                    ->searchable(),
                TextColumn::make('turma.codigo')
                    ->numeric()
                    ->sortable(),
                IconColumn::make('ativo')
                    ->boolean(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                //
            ])
            ->recordActions([
                //
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }
}
