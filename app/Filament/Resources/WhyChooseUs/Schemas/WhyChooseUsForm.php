<?php

namespace App\Filament\Resources\WhyChooseUs\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class WhyChooseUsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                 TextInput::make('title')
                    ->label('Judul')
                    ->default('Mengapa Memilih Kami?')
                    ->required(),
                Textarea::make('subtitle')
                    ->label('Subjudul')
                    ->default('Prioritas utama kami adalah memberikan hasil cetak dengan kualitas premium, pengerjaan cepat, dan pelayanan terbaik untuk Anda.')
                    ->required()
                    ->columnSpanFull(),
                TagsInput::make('features')
                    ->label('Daftar Keunggulan (Ketik dan tekan Enter)')
                    ->placeholder('Tambah keunggulan...')
                    ->default([
                        'Kualitas cetak tajam & presisi',
                        'Tim desainer profesional',
                        'Pengerjaan cepat & tepat waktu',
                        'Harga terjangkau & kompetitif',
                    ])
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('image_path')
                    ->label('Gambar Mockup Samping (contoh: brosur/produk)')
                    ->image()
                    ->directory('why_choose_us')
                    ->disk('public')
                    ->nullable(),
            ]);
    }
}
