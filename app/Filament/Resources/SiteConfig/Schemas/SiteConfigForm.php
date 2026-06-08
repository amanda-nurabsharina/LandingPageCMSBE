<?php

namespace App\Filament\Resources\SiteConfig\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\ColorPicker;
use Filament\Schemas\Components\Section;
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
                Section::make('Tautan Media Sosial')
                    ->schema([
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
                    ])
                    ->columns(3)
                    ->columnSpanFull(),
                Section::make('Pengaturan Warna Tema Landing Page')
                    ->description('Sesuaikan palet warna yang akan digunakan pada landing page Anda.')
                    ->schema([
                        ColorPicker::make('primary_color')
                            ->label('Warna Utama')
                            ->default('#881337')
                            ->required(),
                        ColorPicker::make('secondary_color')
                            ->label('Warna Sekunder')
                            ->default('#0F172A')
                            ->required(),
                        ColorPicker::make('accent_color')
                            ->label('Warna Aksen')
                            ->default('#F59E0B')
                            ->required(),
                        ColorPicker::make('background_color')
                            ->label('Warna Latar')
                            ->default('#F8FAFC')
                            ->required(),
                    ])
                    ->columns(4)
                    ->columnSpanFull(),
            ]);
    }
}
