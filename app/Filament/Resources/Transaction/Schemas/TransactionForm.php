<?php

namespace App\Filament\Resources\Transaction;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TransactionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('type')
                    ->label('Tipe Kas')
                    ->options([
                        'income' => 'Pemasukan',
                        'expense' => 'Pengeluaran',
                    ])
                    ->required(),
                TextInput::make('category')
                    ->label('Kategori')
                    ->placeholder('e.g. Operasional, Bahan Baku, Gaji, Sewa Ruko')
                    ->required()
                    ->maxLength(255),
                TextInput::make('amount')
                    ->label('Jumlah Uang (Rp)')
                    ->numeric()
                    ->prefix('Rp')
                    ->required(),
                DatePicker::make('transaction_date')
                    ->label('Tanggal Transaksi')
                    ->required()
                    ->default(now()),
                Textarea::make('description')
                    ->label('Keterangan / Detail')
                    ->columnSpanFull()
                    ->maxLength(65535),
            ]);
    }
}
