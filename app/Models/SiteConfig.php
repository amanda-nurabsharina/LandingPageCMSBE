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
        'services_title',
        'services_subtitle',
        'portfolio_title',
        'portfolio_subtitle',
        'order_steps_title',
        'order_steps_subtitle',
        'testimonials_title',
        'testimonials_subtitle',
    ];

    protected $attributes = [
        'contact_title' => 'Kirimkan Pesan atau Konsultasi Gratis',
        'contact_subtitle' => 'Punya pertanyaan mengenai bahan, ukuran cetakan, atau ingin mendiskusikan pesanan khusus (custom)? Isi formulir, tim ahli kami akan segera menghubungi Anda.',
        'news_title' => 'Berita & Informasi Terkini',
        'news_subtitle' => 'Ikuti perkembangan terbaru mengenai layanan, promo, dan tips seputar percetakan digital kami.',
        'activities_title' => 'Aktifitas & Dokumentasi',
        'activities_subtitle' => 'Dokumentasi portofolio kerja, kesibukan tim cetak, serta event penting yang kami hadiri.',
        'services_title' => 'Solusi Percetakan Cetak Custom Lengkap',
        'services_subtitle' => 'Kami siap mencetak berbagai produk kebutuhan branding, promosi, dan bisnis Anda dengan mesin berteknologi canggih.',
        'portfolio_title' => 'Hasil Cetakan Terbaik Kami',
        'portfolio_subtitle' => 'Berikut adalah beberapa galeri foto produk cetakan yang telah diselesaikan untuk klien-klien kami yang puas.',
        'order_steps_title' => 'Cara Pemesanan Sangat Mudah',
        'order_steps_subtitle' => 'Cukup selesaikan 4 langkah mudah berikut untuk mewujudkan ide Anda dalam hasil cetak siap pakai.',
        'testimonials_title' => 'Apa Kata Pelanggan Setia Kami',
        'testimonials_subtitle' => 'Kelegaan dan kepuasan pelanggan adalah komitmen utama kami. Simak penilaian langsung mereka.',
    ];
}
