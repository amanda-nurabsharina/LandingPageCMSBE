<?php

namespace App\Filament\Resources\Product\Schemas;

use App\Models\Ingredient;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama Produk')
                    ->required()
                    ->maxLength(255),
                TextInput::make('selling_price')
                    ->label('Harga Jual (Rp)')
                    ->required()
                    ->numeric()
                    ->prefix('Rp')
                    ->default(0),
                TextInput::make('hpp')
                    ->label('HPP Terhitung (Rp)')
                    ->disabled()
                    ->dehydrated(false)
                    ->prefix('Rp')
                    ->placeholder('Otomatis dihitung berdasarkan bahan baku')
                    ->default(0),
                
                Repeater::make('productIngredients')
                    ->label('Bahan Baku / Resep Produk')
                    ->relationship('productIngredients')
                    ->schema([
                        Select::make('ingredient_id')
                            ->label('Bahan Baku')
                            ->relationship('ingredient', 'name')
                            ->required()
                            ->searchable(),
                        TextInput::make('quantity')
                            ->label('Jumlah Penggunaan')
                            ->required()
                            ->numeric()
                            ->default(1),
                    ])
                    ->columns(2)
                    ->columnSpanFull()
                    ->itemLabel(fn (array $state): ?string => 
                        isset($state['ingredient_id']) 
                            ? (Ingredient::find($state['ingredient_id'])->name ?? null) 
                            : null
                    ),
            ]);
    }
}
