<?php

namespace App\Filament\Resources\ServicePremium\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class ServicePremiumForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Nama Layanan')
                    ->required(),
                Textarea::make('description')
                    ->label('Deskripsi Layanan')
                    ->nullable()
                    ->columnSpanFull(),
                FileUpload::make('image_path')
                    ->label('Gambar / Ilustrasi Line Art')
                    ->image()
                    ->directory('service_premiums')
                    ->disk('public')
                    ->nullable(),
                TextInput::make('button_text')
                    ->label('Teks Tombol')
                    ->required()
                    ->default('Start Project'),
                TextInput::make('button_url')
                    ->label('URL Tombol')
                    ->required()
                    ->default('whatsapp')
                    ->hidden(),
                TextInput::make('sort_order')
                    ->label('Urutan Tampilan')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
