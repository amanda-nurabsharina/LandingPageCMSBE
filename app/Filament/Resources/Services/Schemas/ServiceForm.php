<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

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
                TextInput::make('icon')
                    ->label('Ikon (Lucide)')
                    ->placeholder('contoh: coffee, shopping-bag, utensils')
                    ->required(),
                TextInput::make('sort_order')
                    ->label('Urutan Tampilan')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
