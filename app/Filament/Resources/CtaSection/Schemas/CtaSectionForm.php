<?php

namespace App\Filament\Resources\CtaSection\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class CtaSectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Judul Banner')
                    ->default('Siap Mencetak Ide Anda?')
                    ->required(),
                Textarea::make('subtitle')
                    ->label('Subjudul / Deskripsi Banner')
                    ->default('Yuk, mulai konsultasi gratis dengan tim ahli kami untuk mendapatkan hasil terbaik untuk bisnismu!')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('btn_text')
                    ->label('Teks Tombol')
                    ->default('Pesan Sekarang')
                    ->nullable(),
                Select::make('btn_url')
                    ->label('Tujuan Tombol')
                    ->options([
                        'whatsapp' => 'Hubungi WhatsApp',
                        '#services' => 'Bagian Layanan (Services)',
                        '#benefits' => 'Bagian Keunggulan (Why Choose Us)',
                        '#portfolio' => 'Bagian Portofolio',
                        '#timeline' => 'Bagian Cara Pesan (Order Timeline)',
                        '#testimonials' => 'Bagian Testimoni',
                        '#contact' => 'Bagian Kontak / Hubungi Kami',
                    ])
                    ->default('whatsapp')
                    ->required(),
            ]);
    }
}
