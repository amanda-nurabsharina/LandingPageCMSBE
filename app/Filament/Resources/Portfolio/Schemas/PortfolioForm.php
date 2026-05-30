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
                    ->required(),
                TextInput::make('category')
                    ->required()
                    ->placeholder('e.g. Stiker, Kartu, Buku, Brosur, Banner'),
                FileUpload::make('image_path')
                    ->label('Portfolio Image')
                    ->image()
                    ->directory('portfolios')
                    ->disk('public')
                    ->required(),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
