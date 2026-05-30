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
                    ->default('PrintHub')
                    ->required(),
                FileUpload::make('logo')
                    ->image()
                    ->directory('logos')
                    ->disk('public')
                    ->nullable(),
                TextInput::make('whatsapp_number')
                    ->label('WhatsApp Number (Format: 628...)')
                    ->placeholder('e.g. 628123456789')
                    ->required(),
                TextInput::make('email')
                    ->email()
                    ->nullable(),
                Textarea::make('address')
                    ->nullable()
                    ->columnSpanFull(),
                TextInput::make('facebook_url')
                    ->url()
                    ->nullable(),
                TextInput::make('instagram_url')
                    ->url()
                    ->nullable(),
                TextInput::make('twitter_url')
                    ->url()
                    ->nullable(),
            ]);
    }
}
