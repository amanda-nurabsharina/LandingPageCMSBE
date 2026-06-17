<?php

namespace App\Filament\Resources\Statistic\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class StatisticForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('value')
                    ->label('Nilai / Angka')
                    ->placeholder('contoh: 500+, 10.000+, 5 Tahun')
                    ->required(),
                TextInput::make('label')
                    ->label('Label / Nama Statistik')
                    ->placeholder('contoh: Pelanggan Puas, Produk Terjual')
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
