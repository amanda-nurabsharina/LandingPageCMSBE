<?php

namespace App\Filament\Resources\HeroBackground\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class HeroBackgroundsTable
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
