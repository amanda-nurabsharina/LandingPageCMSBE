<?php

namespace App\Filament\Resources\Ingredient\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Support\RawJs;

class IngredientForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama Bahan')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),
                TextInput::make('unit')
                    ->label('Satuan Unit')
                    ->placeholder('e.g. gram, ml, pcs, sheet, meter')
                    ->required()
                    ->maxLength(50)
                    ->regex('/^[a-zA-Z\s]+$/')
                    ->validationMessages([
                        'regex' => 'Satuan unit hanya boleh berisi huruf dan spasi.',
                    ]),
                TextInput::make('cost_per_unit')
                    ->label('Biaya Per Unit (Rp)')
                    ->required()
                    ->prefix('Rp')
                    ->default(0)
                    ->mask(RawJs::make('$money($input, \',\', \'.\', 0)'))
                    ->formatStateUsing(fn ($state) => $state !== null ? (int) $state : null)
                    ->regex('/^[0-9.]+$/')
                    ->validationMessages([
                        'regex' => 'Biaya per unit hanya boleh berisi angka dan titik pemisah ribuan.',
                    ])
                    ->dehydrateStateUsing(fn ($state) => $state !== null ? (int) str_replace('.', '', $state) : null),
            ]);
    }
}
