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
                    ->label('Lencana / Teks Kecil')
                    ->placeholder('contoh: Bisnis Kuliner Terbaik')
                    ->nullable(),
                TextInput::make('title')
                    ->label('Judul Utama')
                    ->default('Wujudkan Ide Anda Dalam Cetakan')
                    ->required(),
                Textarea::make('subtitle')
                    ->label('Subjudul')
                    ->default('Temukan solusi percetakan digital berkualitas terbaik untuk spanduk, brosur, stiker, dan kemasan Anda.')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('primary_btn_text')
                    ->label('Teks Tombol Utama')
                    ->default('Pesan Sekarang')
                    ->nullable(),
                TextInput::make('primary_btn_url')
                    ->label('URL Tombol Utama')
                    ->placeholder('contoh: #order atau link WhatsApp')
                    ->nullable(),
                TextInput::make('secondary_btn_text')
                    ->label('Teks Tombol Sekunder')
                    ->default('Layanan Kami')
                    ->nullable(),
                TextInput::make('secondary_btn_url')
                    ->label('URL Tombol Sekunder')
                    ->placeholder('contoh: #services')
                    ->nullable(),
                FileUpload::make('image_path')
                    ->label('Gambar Banner Hero')
                    ->image()
                    ->directory('hero')
                    ->disk('public')
                    ->nullable(), // Nullable since initial seed won't have uploaded image
            ]);
    }
}
