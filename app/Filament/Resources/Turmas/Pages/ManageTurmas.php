<?php

namespace App\Filament\Resources\Turmas\Pages;

use App\Filament\Resources\Turmas\TurmaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageTurmas extends ManageRecords
{
    protected static string $resource = TurmaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
