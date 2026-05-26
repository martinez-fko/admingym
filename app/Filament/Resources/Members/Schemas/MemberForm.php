<?php

namespace App\Filament\Resources\Members\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;

class MemberForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('first_name')
                    ->label('Nombre')
                    ->required(),
                TextInput::make('last_name')
                    ->label('Apellidos'),
                TextInput::make('phone')
                    ->label('Telefono')
                    ->tel(),
                TextInput::make('email')
                    ->label('Correo')
                    ->email(),
                DatePicker::make('birth_date')
                    ->label('Cumpleaños'),
                Select::make('gender')
                    ->label('Sexo')
                    ->options(['male' => 'Masculino', 'female' => 'Femenino', 'other' => 'Otro'])
                    ->required(),
                FileUpload::make('photo')
                    ->image()
                    ->disk('local')
                    ->directory('members')
                    ->label('Foto')
                    ->maxSize(1024),
                TextInput::make('emergency_contact_name')
                    ->label('Contacto de emergencia'),
                TextInput::make('emergency_contact_phone')
                    ->label('Telefono de emergencia')
                    ->tel(),
                DatePicker::make('join_date')
                    ->label('Fecha de ingreso')
                    ->required(),
                Textarea::make('notes')
                    ->label('Notas')
                    ->columnSpanFull(),
                Toggle::make('is_active')
                    ->label('Activo')
                    ->default(true)
                    ->required(),
            ]);
    }
}
