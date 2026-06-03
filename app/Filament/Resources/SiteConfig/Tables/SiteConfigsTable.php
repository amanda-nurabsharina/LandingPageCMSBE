<?php

namespace App\Filament\Resources\SiteConfig\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SiteConfigsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('site_name')
                    ->label('Nama Situs / Bisnis'),
                TextColumn::make('whatsapp_number')
                    ->label('Nomor WhatsApp'),
            ])
            ->recordActions([
                EditAction::make(),
            ]);
    }
}
