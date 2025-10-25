<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->email()
                    ->required(),
                TextInput::make('password')
                    ->password()
                    ->required()
                    ->maxLength(255)
                    ->same('password_confirmation'),
                TextInput::make('password_confirmation')
                    ->password()
                    ->required()
                    ->maxLength(255),
            ]);
    }
}
