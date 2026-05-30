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
                    ->placeholder('e.g. 500+, 10,000+, 5 Tahun')
                    ->required(),
                TextInput::make('label')
                    ->placeholder('e.g. Klien Puas, Produk Terkirim')
                    ->required(),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
