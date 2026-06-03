<?php

namespace App\Filament\Resources\SiteConfig\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class SiteConfigForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('site_name')
                    ->label('Nama Situs / Bisnis')
                    ->default('Bisnis Kami')
                    ->required(),
                FileUpload::make('logo')
                    ->label('Logo Bisnis')
                    ->image()
                    ->directory('logos')
                    ->disk('public')
                    ->nullable(),
                TextInput::make('whatsapp_number')
                    ->label('Nomor WhatsApp (Format: 628...)')
                    ->placeholder('contoh: 628123456789')
                    ->required(),
                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->nullable(),
                Textarea::make('address')
                    ->label('Alamat Kantor / Toko')
                    ->nullable()
                    ->columnSpanFull(),
                TextInput::make('facebook_url')
                    ->label('URL Facebook')
                    ->url()
                    ->nullable(),
                TextInput::make('instagram_url')
                    ->label('URL Instagram')
                    ->url()
                    ->nullable(),
                TextInput::make('twitter_url')
                    ->label('URL Twitter / X')
                    ->url()
                    ->nullable(),
            ]);
    }
}
