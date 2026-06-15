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
                Section::make('Konten Formulir Kontak / Leads')
                    ->description('Sesuaikan judul dan subjudul untuk bagian formulir hubungi kami di landing page.')
                    ->schema([
                        TextInput::make('contact_title')
                            ->label('Judul Bagian Kontak')
                            ->default('Kirimkan Pesan atau Konsultasi Gratis')
                            ->required(),
                        Textarea::make('contact_subtitle')
                            ->label('Deskripsi / Subjudul Bagian Kontak')
                            ->default('Punya pertanyaan mengenai bahan, ukuran cetakan, atau ingin mendiskusikan pesanan khusus (custom)? Isi formulir, tim ahli kami akan segera menghubungi Anda.')
                            ->required()
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),
                Section::make('Konten Bagian Berita / News')
                    ->description('Sesuaikan judul dan deskripsi bagian berita di landing page.')
                    ->schema([
                        TextInput::make('news_title')
                            ->label('Judul Bagian Berita')
                            ->default('Berita & Informasi Terkini')
                            ->required(),
                        Textarea::make('news_subtitle')
                            ->label('Deskripsi / Subjudul Bagian Berita')
                            ->default('Ikuti perkembangan terbaru mengenai layanan, promo, dan tips seputar percetakan digital kami.')
                            ->required()
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),
                Section::make('Konten Bagian Aktifitas / Kegiatan')
                    ->description('Sesuaikan judul dan deskripsi bagian aktifitas/kegiatan di landing page.')
                    ->schema([
                        TextInput::make('activities_title')
                            ->label('Judul Bagian Kegiatan')
                            ->default('Aktifitas & Dokumentasi')
                            ->required(),
                        Textarea::make('activities_subtitle')
                            ->label('Deskripsi / Subjudul Bagian Kegiatan')
                            ->default('Dokumentasi portofolio kerja, kesibukan tim cetak, serta event penting yang kami hadiri.')
                            ->required()
                            ->columnSpanFull(),
                    ])
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
