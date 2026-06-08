<?php

namespace App\Filament\Resources\LandingSection\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class LandingSectionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Nama Menu / Section')
                    ->searchable(),
                TextColumn::make('section_key')
                    ->label('ID Section')
                    ->badge()
                    ->color('gray'),
                ToggleColumn::make('is_active')
                    ->label('Status Aktif'),
            ])
            ->reorderable('sort_order')
            ->defaultSort('sort_order', 'asc')
            ->recordActions([
                EditAction::make(),
            ]);
    }
}
