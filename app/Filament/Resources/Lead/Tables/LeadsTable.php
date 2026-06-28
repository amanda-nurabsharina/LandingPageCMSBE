<?php

namespace App\Filament\Resources\Lead\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DeleteAction;
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
                \Filament\Actions\Action::make('whatsapp')
                    ->label('Hubungi WA')
                    ->icon('heroicon-m-chat-bubble-left-right')
                    ->color('success')
                    ->url(function ($record) {
                        if (! $record || ! $record->phone) return null;
                        
                        // Sanitasi nomor HP
                        $phone = preg_replace('/[^0-9]/', '', $record->phone);
                        if (str_starts_with($phone, '0')) {
                            $phone = '62' . substr($phone, 1);
                        }
                        
                        // Pesan template
                        $message = "Halo *{$record->name}*,\n\nTerima kasih telah menghubungi kami. Terkait pesan Anda:\n_\"{$record->message}\"_\n\nBerikut tanggapan kami: ";
                        
                        return "https://wa.me/{$phone}?text=" . rawurlencode($message);
                    })
                    ->openUrlInNewTab(),
                EditAction::make()->label('Buka Pesan'),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
