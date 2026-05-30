<?php

namespace App\Filament\Resources\HeroSection\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class HeroSectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('badge')
                    ->placeholder('e.g. Percetakan Nasional')
                    ->nullable(),
                TextInput::make('title')
                    ->default('Wujudkan Ide Anda Dalam Cetakan')
                    ->required(),
                Textarea::make('subtitle')
                    ->default('Temukan solusi percetakan digital berkualitas terbaik untuk spanduk, brosur, stiker, dan kemasan Anda.')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('primary_btn_text')
                    ->default('Pesan Sekarang')
                    ->nullable(),
                TextInput::make('primary_btn_url')
                    ->placeholder('e.g. #order or WhatsApp redirect link')
                    ->nullable(),
                TextInput::make('secondary_btn_text')
                    ->default('Layanan Kami')
                    ->nullable(),
                TextInput::make('secondary_btn_url')
                    ->placeholder('e.g. #services')
                    ->nullable(),
                FileUpload::make('image_path')
                    ->label('Hero Banner Image')
                    ->image()
                    ->directory('hero')
                    ->disk('public')
                    ->nullable(), // Nullable since initial seed won't have uploaded image
            ]);
    }
}
