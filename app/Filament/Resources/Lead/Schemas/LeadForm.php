<?php

namespace App\Filament\Resources\Lead\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class LeadForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama Pengirim')
                    ->disabled(),
                TextInput::make('phone')
                    ->label('Nomor Telepon/WA')
                    ->disabled()
                    ->suffixAction(
                        \Filament\Actions\Action::make('whatsapp')
                            ->icon('heroicon-m-chat-bubble-left-right')
                            ->color('success')
                            ->tooltip('Kirim pesan WhatsApp / Balas Pesan')
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
                            ->openUrlInNewTab()
                    ),
                Textarea::make('message')
                    ->label('Pesan')
                    ->rows(5)
                    ->disabled()
                    ->columnSpanFull(),
            ]);
    }
}
