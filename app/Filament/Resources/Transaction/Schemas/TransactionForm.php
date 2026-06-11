<?php

namespace App\Filament\Resources\Transaction\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Support\RawJs;

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
                    ->prefix('Rp')
                    ->required()
                    ->mask(RawJs::make('$money($input, \',\', \'.\', 0)'))
                    ->formatStateUsing(fn ($state) => $state !== null ? (int) $state : null)
                    ->regex('/^[0-9.]+$/')
                    ->validationMessages([
                        'regex' => 'Jumlah uang hanya boleh berisi angka dan titik pemisah ribuan.',
                    ])
                    ->dehydrateStateUsing(fn ($state) => $state !== null ? (int) str_replace('.', '', $state) : null),
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
