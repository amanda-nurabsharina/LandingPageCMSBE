<?php

namespace App\Filament\Resources\Branch\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class BranchForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama Cabang')
                    ->placeholder('contoh: Cabang Jakarta Pusat')
                    ->required()
                    ->maxLength(255),
                TextInput::make('phone')
                    ->label('Nomor Telepon/WA')
                    ->placeholder('contoh: 08123456789')
                    ->nullable()
                    ->maxLength(20),
                Textarea::make('address')
                    ->label('Alamat Lengkap')
                    ->placeholder('Jl. Jenderal Sudirman No. 10...')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('latitude')
                    ->label('Latitude')
                    ->placeholder('contoh: -6.175392')
                    ->required()
                    ->hint('Koordinat Latitude dari Google Maps')
                    ->maxLength(50),
                TextInput::make('longitude')
                    ->label('Longitude')
                    ->placeholder('contoh: 106.827153')
                    ->required()
                    ->hint('Koordinat Longitude dari Google Maps')
                    ->maxLength(50),
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
