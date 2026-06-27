<?php

namespace App\Filament\Resources\HeroSection\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
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
                    ->hintIcon('heroicon-m-information-circle', tooltip: 'Gunakan kurung siku [...] untuk mewarnai kata tertentu (contoh: Wujudkan Ide Anda [Dalam Cetakan]).')
                    ->required(),
                Textarea::make('subtitle')
                    ->label('Subjudul')
                    ->default('Temukan solusi percetakan digital berkualitas terbaik untuk spanduk, brosur, stiker, dan kemasan Anda.')
                    ->hintIcon('heroicon-m-information-circle', tooltip: 'Gunakan kurung siku [...] untuk mewarnai kata tertentu.')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('primary_btn_text')
                    ->label('Teks Tombol Utama')
                    ->default('Pesan Sekarang')
                    ->nullable(),
                Select::make('primary_btn_url')
                    ->label('Tujuan Tombol Utama')
                    ->options([
                        'whatsapp' => 'Hubungi WhatsApp',
                        '#about' => 'Bagian Tentang Kami (About)',
                        '#services' => 'Bagian Layanan (Services)',
                        '#services_premium' => 'Bagian Layanan Premium',
                        '#benefits' => 'Bagian Keunggulan (Why Choose Us)',
                        '#portfolio' => 'Bagian Portofolio',
                        '#timeline' => 'Bagian Cara Pesan (Order Timeline)',
                        '#testimonials' => 'Bagian Testimoni',
                        '#news' => 'Bagian Berita & Informasi (News)',
                        '#activities' => 'Bagian Kegiatan Kami (Activities)',
                        '#contact' => 'Bagian Formulir Kontak',
                    ])
                    ->default('whatsapp')
                    ->required(),
                TextInput::make('secondary_btn_text')
                    ->label('Teks Tombol Sekunder')
                    ->default('Layanan Kami')
                    ->nullable(),
                Select::make('secondary_btn_url')
                    ->label('Tujuan Tombol Sekunder')
                    ->options([
                        'whatsapp' => 'Hubungi WhatsApp',
                        '#about' => 'Bagian Tentang Kami (About)',
                        '#services' => 'Bagian Layanan (Services)',
                        '#services_premium' => 'Bagian Layanan Premium',
                        '#benefits' => 'Bagian Keunggulan (Why Choose Us)',
                        '#portfolio' => 'Bagian Portofolio',
                        '#timeline' => 'Bagian Cara Pesan (Order Timeline)',
                        '#testimonials' => 'Bagian Testimoni',
                        '#news' => 'Bagian Berita & Informasi (News)',
                        '#activities' => 'Bagian Kegiatan Kami (Activities)',
                        '#contact' => 'Bagian Formulir Kontak',
                    ])
                    ->default('#services')
                    ->required(),
                FileUpload::make('image_path')
                    ->label('Gambar Banner Hero')
                    ->image()
                    ->directory('hero')
                    ->disk('public')
                    ->nullable(), // Nullable since initial seed won't have uploaded image
            ]);
    }
}
