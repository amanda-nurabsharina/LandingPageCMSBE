<?php

namespace App\Filament\Resources\OrderStep\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use App\Filament\Forms\Components\IconPicker;

class OrderStepForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('step_number')
                    ->label('Nomor Langkah')
                    ->required()
                    ->numeric()
                    ->unique(ignoreRecord: true),
                TextInput::make('title')
                    ->label('Judul Langkah')
                    ->placeholder('contoh: Pemesanan, Pembayaran, Pengiriman')
                    ->required(),
                Textarea::make('description')
                    ->label('Deskripsi Langkah')
                    ->placeholder('Masukkan instruksi detail untuk langkah ini...')
                    ->required()
                    ->columnSpanFull(),
                IconPicker::make('icon')
                    ->label('Ikon (Lucide)')
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
