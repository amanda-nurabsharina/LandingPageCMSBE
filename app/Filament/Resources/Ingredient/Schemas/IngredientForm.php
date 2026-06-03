<?php

namespace App\Filament\Resources\Ingredient\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class IngredientForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama Bahan')
                    ->required()
                    ->maxLength(255),
                TextInput::make('unit')
                    ->label('Satuan Unit')
                    ->placeholder('e.g. gram, ml, pcs, sheet, meter')
                    ->required()
                    ->maxLength(50),
                TextInput::make('cost_per_unit')
                    ->label('Biaya Per Unit (Rp)')
                    ->required()
                    ->numeric()
                    ->prefix('Rp')
                    ->default(0),
            ]);
    }
}
