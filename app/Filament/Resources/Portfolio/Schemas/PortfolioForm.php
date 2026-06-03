<?php

namespace App\Filament\Resources\Portfolio\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class PortfolioForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Nama Portofolio')
                    ->required(),
                TextInput::make('category')
                    ->label('Kategori')
                    ->required()
                    ->placeholder('contoh: Makanan, Minuman, Kemasan, Banner'),
                FileUpload::make('image_path')
                    ->label('Gambar Portofolio')
                    ->image()
                    ->directory('portfolios')
                    ->disk('public')
                    ->required(),
                TextInput::make('sort_order')
                    ->label('Urutan Tampilan')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
