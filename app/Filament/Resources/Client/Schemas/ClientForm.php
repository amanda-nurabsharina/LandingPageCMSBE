<?php

namespace App\Filament\Resources\Client\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ClientForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama Klien / Perusahaan')
                    ->placeholder('contoh: PT Maju Jaya')
                    ->required()
                    ->maxLength(255),
                FileUpload::make('logo')
                    ->label('Logo Klien')
                    ->image()
                    ->directory('clients')
                    ->disk('public')
                    ->required()
                    ->hint('Rekomendasi format PNG transparan atau SVG dengan ukuran proporsional'),
                TextInput::make('website_url')
                    ->label('Tautan Website Klien (Opsional)')
                    ->placeholder('contoh: https://majujaya.com')
                    ->url()
                    ->nullable()
                    ->maxLength(255),
                Toggle::make('is_active')
                    ->label('Aktif')
                    ->default(true),
                TextInput::make('sort_order')
                    ->label('Urutan')
                    ->numeric()
                    ->default(0)
                    ->required(),
            ]);
    }
}
