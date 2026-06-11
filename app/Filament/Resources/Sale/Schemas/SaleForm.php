<?php

namespace App\Filament\Resources\Sale\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SaleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('sale_number')
                    ->label('Nomor Invoice')
                    ->disabled()
                    ->placeholder('Otomatis dibuat setelah disimpan'),
                TextInput::make('customer_name')
                    ->label('Nama Pelanggan')
                    ->maxLength(255),
                DatePicker::make('transaction_date')
                    ->label('Tanggal Transaksi')
                    ->required()
                    ->default(now()),
                
                Repeater::make('items')
                    ->label('Daftar Item Belanja')
                    ->relationship('items')
                    ->schema([
                        Select::make('product_id')
                            ->label('Produk')
                            ->relationship('product', 'name')
                            ->required()
                            ->searchable()
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $set) {
                                $product = \App\Models\Product::find($state);
                                if ($product) {
                                    $set('unit_price', $product->selling_price);
                                }
                            }),
                        TextInput::make('unit_price')
                            ->label('Harga Satuan (Rp)')
                            ->required()
                            ->prefix('Rp')
                            ->formatStateUsing(fn ($state) => $state !== null ? (int) $state : null)
                            ->regex('/^[0-9.]+$/')
                            ->validationMessages([
                                'regex' => 'Harga satuan hanya boleh berisi angka dan titik pemisah ribuan.',
                            ])
                            ->dehydrateStateUsing(fn ($state) => $state !== null ? (int) str_replace('.', '', $state) : null),
                        TextInput::make('quantity')
                            ->label('Jumlah')
                            ->required()
                            ->numeric()
                            ->default(1),
                    ])
                    ->columns(3)
                    ->columnSpanFull(),
            ]);
    }
}
