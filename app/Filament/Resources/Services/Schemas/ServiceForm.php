<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use App\Filament\Forms\Components\IconPicker;

class ServiceForm
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
                    ->required()
                    ->columnSpanFull(),
                IconPicker::make('icon')
                    ->label('Ikon (Lucide)')
                    ->required(),
                TextInput::make('sort_order')
                    ->label('Urutan Tampilan')
                    ->required()
                    ->numeric()
                    ->default(0)
                    ->unique(ignoreRecord: true),
            ]);
    }
}
