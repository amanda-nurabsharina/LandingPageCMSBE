<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteConfig extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name',
        'logo',
        'whatsapp_number',
        'email',
        'address',
        'facebook_url',
        'instagram_url',
        'twitter_url',
        'primary_color',
        'secondary_color',
        'accent_color',
        'background_color',
        'contact_title',
        'contact_subtitle',
        'news_title',
        'news_subtitle',
        'activities_title',
        'activities_subtitle',
    ];

    protected $attributes = [
        'contact_title' => 'Kirimkan Pesan atau Konsultasi Gratis',
        'contact_subtitle' => 'Punya pertanyaan mengenai bahan, ukuran cetakan, atau ingin mendiskusikan pesanan khusus (custom)? Isi formulir, tim ahli kami akan segera menghubungi Anda.',
        'news_title' => 'Berita & Informasi Terkini',
        'news_subtitle' => 'Ikuti perkembangan terbaru mengenai layanan, promo, dan tips seputar percetakan digital kami.',
        'activities_title' => 'Aktifitas & Dokumentasi',
        'activities_subtitle' => 'Dokumentasi portofolio kerja, kesibukan tim cetak, serta event penting yang kami hadiri.',
    ];
}
