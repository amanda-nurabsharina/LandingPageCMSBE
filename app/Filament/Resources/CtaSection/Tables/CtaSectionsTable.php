<?php

namespace App\Filament\Resources\CtaSection\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CtaSectionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Judul Banner'),
            ])
            ->recordActions([
                EditAction::make(),
            ]);
    }
}
