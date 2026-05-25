<?php
// app/Filament/Auth/Login.php

namespace App\Filament\Resources\Auth;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Auth\Pages\Login as BaseLogin;
use Illuminate\Validation\ValidationException;

class Login extends BaseLogin
{
    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('username')
                    ->label('Usuario')
                    ->required()
                    ->autofocus(),

                $this->getPasswordFormComponent(),
                $this->getRememberFormComponent(),
            ]);
    }

    protected function getCredentialsFromFormData(array $data): array
    {
        return [
            'username' => $data['username'],
            'password' => $data['password'],
        ];
    }

    protected function throwFailureValidationException(): never
    {
        throw ValidationException::withMessages([
            'data.username' => 'Las credenciales son incorrectas.',
        ]);
    }
}