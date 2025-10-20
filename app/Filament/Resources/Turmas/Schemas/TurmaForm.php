<?php

namespace App\Filament\Resources\Turmas\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TurmaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('codigo')->required(),
            ]);
    }
}
