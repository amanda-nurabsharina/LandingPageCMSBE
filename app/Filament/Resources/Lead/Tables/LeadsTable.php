<?php

namespace App\Filament\Resources\Lead\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class LeadsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama Pengirim')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('phone')
                    ->label('Nomor WA')
                    ->searchable(),
                TextColumn::make('message')
                    ->label('Pesan')
                    ->limit(50)
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('Tanggal Masuk')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([])
            ->recordActions([
                EditAction::make()->label('Buka Pesan'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
