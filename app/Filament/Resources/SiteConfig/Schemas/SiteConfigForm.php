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
                Section::make('Konten Bagian Layanan / Services')
                    ->description('Sesuaikan judul dan deskripsi bagian layanan di landing page.')
                    ->schema([
                        TextInput::make('services_title')
                            ->label('Judul Bagian Layanan')
                            ->default('Solusi Percetakan Cetak Custom Lengkap')
                            ->required(),
                        Textarea::make('services_subtitle')
                            ->label('Deskripsi / Subjudul Bagian Layanan')
                            ->default('Kami siap mencetak berbagai produk kebutuhan branding, promosi, dan bisnis Anda dengan mesin berteknologi canggih.')
                            ->required()
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),
                Section::make('Konten Bagian Portofolio')
                    ->description('Sesuaikan judul dan deskripsi bagian portofolio di landing page.')
                    ->schema([
                        TextInput::make('portfolio_title')
                            ->label('Judul Bagian Portofolio')
                            ->default('Hasil Cetakan Terbaik Kami')
                            ->required(),
                        Textarea::make('portfolio_subtitle')
                            ->label('Deskripsi / Subjudul Bagian Portofolio')
                            ->default('Berikut adalah beberapa galeri foto produk cetakan yang telah diselesaikan untuk klien-klien kami yang puas.')
                            ->required()
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),
                Section::make('Konten Bagian Cara Pesan / Timeline')
                    ->description('Sesuaikan judul dan deskripsi bagian cara pemesanan di landing page.')
                    ->schema([
                        TextInput::make('order_steps_title')
                            ->label('Judul Bagian Cara Pesan')
                            ->default('Cara Pemesanan Sangat Mudah')
                            ->required(),
                        Textarea::make('order_steps_subtitle')
                            ->label('Deskripsi / Subjudul Bagian Cara Pesan')
                            ->default('Cukup selesaikan 4 langkah mudah berikut untuk mewujudkan ide Anda dalam hasil cetak siap pakai.')
                            ->required()
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),
                Section::make('Konten Bagian Testimoni')
                    ->description('Sesuaikan judul dan deskripsi bagian testimoni di landing page.')
                    ->schema([
                        TextInput::make('testimonials_title')
                            ->label('Judul Bagian Testimoni')
                            ->default('Apa Kata Pelanggan Setia Kami')
                            ->required(),
                        Textarea::make('testimonials_subtitle')
                            ->label('Deskripsi / Subjudul Bagian Testimoni')
                            ->default('Kelegaan dan kepuasan pelanggan adalah komitmen utama kami. Simak penilaian langsung mereka.')
                            ->required()
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),
                Section::make('Konten Bagian Footer')
                    ->description('Sesuaikan deskripsi pada bagian kaki (footer) landing page.')
                    ->schema([
                        Textarea::make('footer_description')
                            ->label('Deskripsi Footer')
                            ->default('Menyediakan layanan cetak banner, stiker kemasan, brosur, kartu nama, dan aneka merchandise digital berkualitas tinggi dengan pengerjaan kilat.')
                            ->required()
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),
                Section::make('Konten Bagian Tentang Kami / About Us')
                    ->description('Sesuaikan judul dan deskripsi bagian Tentang Kami.')
                    ->schema([
                        TextInput::make('about_title')
                            ->label('Judul Bagian Tentang Kami')
                            ->default('Innovation meets precision.')
                            ->required(),
                        Textarea::make('about_subtitle')
                            ->label('Deskripsi / Subjudul Bagian Tentang Kami')
                            ->default('Welcome to Fourplusone. We are a premier IT Software House dedicated to bridging the gap between complex business needs and elegant digital experiences')
                            ->required()
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),
                Section::make('Konten Bagian Layanan Premium')
                    ->description('Sesuaikan judul dan deskripsi bagian Layanan Premium.')
                    ->schema([
                        TextInput::make('service_premium_title')
                            ->label('Judul Bagian Layanan Premium')
                            ->default('Services We Provide')
                            ->required(),
                        Textarea::make('service_premium_subtitle')
                            ->label('Deskripsi / Subjudul Bagian Layanan Premium')
                            ->default('Tailored solutions for every need—whether scaling an enterprise or celebrating a milestone.')
                            ->required()
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),
                Section::make('Konten Bagian Cara Kerja')
                    ->description('Sesuaikan judul dan deskripsi bagian Cara Kerja.')
                    ->schema([
                        TextInput::make('work_steps_title')
                            ->label('Judul Bagian Cara Kerja')
                            ->default('How We Work')
                            ->required(),
                        Textarea::make('work_steps_subtitle')
                            ->label('Deskripsi / Subjudul Bagian Cara Kerja')
                            ->default('A seamless process designed to save you time and ensure top-quality results')
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
