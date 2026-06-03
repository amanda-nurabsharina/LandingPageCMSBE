<?php

namespace App\Filament\Resources\WhyChooseUs\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class WhyChooseUsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Judul'),
            ])
            ->recordActions([
                EditAction::make(),
            ]);
    }
}
